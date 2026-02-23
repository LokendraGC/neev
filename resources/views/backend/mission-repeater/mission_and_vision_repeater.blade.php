<!-- repeater -->
<script>
    // Pages data for select2 dropdowns
    const pagesData = @json($pages ?? []);
    // English section - slider
    $(document).on('click', '.add_slider', function() {
        let row = addSliderRow();
        $('.addMoreSlider').append(row);
        updateSerialNumbersSlider();
        updateOrderFields();
        updateRowIndices();
        initializeSummernote();
        initializeSelect2();
    });

    $(document).on('click', '.add_more_slider', function() {
        let clickedRow = $(this).closest('tr');
        let row = addSliderRow();
        clickedRow.after(row);
        updateSerialNumbersSlider();
        updateOrderFields();
        updateRowIndices();
        initializeSummernote();
        initializeSelect2();
    });

    $('.addMoreSlider').delegate('.remove_slider', 'click', function() {
        $(this).closest('tr').remove();
        updateSerialNumbersSlider();
        updateOrderFields();
        updateRowIndices();
    });

    // Move row up - English section
    $(document).on('click', '.addMoreSlider .move-up', function() {
        let currentRow = $(this).closest('tr');
        let prevRow = currentRow.prev('tr');

        if (prevRow.length) {
            currentRow.insertBefore(prevRow);
            updateSerialNumbersSlider();
            updateOrderFields();
            updateRowIndices();
            initializeSummernote();
            initializeSelect2();
        }
    });

    // Move row down - English section
    $(document).on('click', '.addMoreSlider .move-down', function() {
        let currentRow = $(this).closest('tr');
        let nextRow = currentRow.next('tr');

        if (nextRow.length) {
            currentRow.insertAfter(nextRow);
            updateSerialNumbersSlider();
            updateOrderFields();
            updateRowIndices();
            initializeSummernote();
            initializeSelect2();
        }
    });

    function addSliderRow() {
        let numberOfRow = $('.addMoreSlider tr').length;

        let tr = `
        <tr>
            <td class="custom-table-no no">${numberOfRow + 1}</td>
            <td>
                <div class="media-input image-input">
                    <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="movement_details${numberOfRow}_image" data-select="single">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose File</div>
                    </div>
                    <div class="preview-closer">
                        <input type="hidden" id="movement_details${numberOfRow}_image" name="movement_details[${numberOfRow}][image]" class="selected-files" value="" />
                        <div id="movement_details${numberOfRow}_image_select"></div>
                    </div>
                </div>
            </td>
          
            <td>
                <input type="text" class="form-control" name="movement_details[${numberOfRow}][title]" value="" />
            </td>
            <td>
                <textarea class="editor" id="movement_details_${numberOfRow}_short_description" name="movement_details[${numberOfRow}][short_description]"></textarea>
            </td>
            <td class="text-center">
                <a href="javascript:void(0);" class="text-success fs-16 px-1 add_more_slider">
                    <i class="bi bi-plus-circle"></i>
                </a>
                <a href="javascript:void(0);" class="text-danger fs-16 px-1 remove_slider">
                    <i class="bi bi-x-circle"></i>
                </a>
                <hr>
                <a href="javascript:void(0);" class="text-primary fs-16 px-1 move-up" title="Move Up">
                    <i class="bi bi-arrow-up-circle"></i>
                </a>
                <a href="javascript:void(0);" class="text-primary fs-16 px-1 move-down" title="Move Down">
                    <i class="bi bi-arrow-down-circle"></i>
                </a>
            </td>
        </tr>
    `;

        return tr;
    }

    function updateSerialNumbersSlider() {
        $('.addMoreSlider tr').each(function(index) {
            $(this).find('.custom-table-no').text(index + 1);
        });
    }

    function updateOrderFields() {
        $('.addMoreSlider tr').each(function(index) {
            $(this).find('.row-order').val(index);
        });
    }

    function updateRowIndices() {
        $('.addMoreSlider tr').each(function(index) {
            let $row = $(this);

            // Update all name attributes to use the new index
            $row.find('input, textarea, select').each(function() {
                let $element = $(this);
                let currentName = $element.attr('name');

                if (currentName && currentName.includes('movement_details[')) {
                    let newName = currentName.replace(/movement_details\[\d+\]/,
                        `movement_details[${index}]`);
                    $element.attr('name', newName);
                }

                // Update IDs for image fields
                let currentId = $element.attr('id');
                if (currentId && currentId.includes('movement_details')) {
                    if (currentId.includes('_image')) {
                        let newId = currentId.replace(/movement_details\d+_image/,
                            `movement_details${index}_image`);
                        $element.attr('id', newId);
                    } else if (currentId.includes('_short_description')) {
                        let newId = currentId.replace(/movement_details_\d+_short_description/,
                            `movement_details_${index}_short_description`);
                        $element.attr('id', newId);
                    }
                }
            });

            // Update data-field attributes for media manager
            $row.find('.open-media-manager').each(function() {
                let $mediaManager = $(this);
                let currentField = $mediaManager.attr('data-field');
                if (currentField && currentField.includes('movement_details')) {
                    let newField = currentField.replace(/movement_details\d+_image/,
                        `movement_details${index}_image`);
                    $mediaManager.attr('data-field', newField);
                }
            });

            // Update div IDs for image select
            $row.find('div[id*="movement_details"][id*="_image_select"]').each(function() {
                let $div = $(this);
                let currentId = $div.attr('id');
                if (currentId) {
                    let newId = currentId.replace(/movement_details\d+_image_select/,
                        `movement_details${index}_image_select`);
                    $div.attr('id', newId);
                }
            });

            // Update data-slug attributes on remove buttons
            $row.find('.remove-attachment').each(function() {
                let $button = $(this);
                let currentSlug = $button.attr('data-slug');
                if (currentSlug && currentSlug.includes('movement_details')) {
                    let newSlug = currentSlug.replace(/movement_details\d+_image/,
                        `movement_details${index}_image`);
                    $button.attr('data-slug', newSlug);
                }
            });

            // Update select2 dropdowns for page selection
            $row.find('select[name*="movement_details"][name*="[page]"]').each(function() {
                let $select = $(this);
                let currentName = $select.attr('name');
                if (currentName && currentName.includes('movement_details[') && currentName.includes(
                        '[page]')) {
                    let newName = currentName.replace(/movement_details\[\d+\]/,
                        `movement_details[${index}]`);
                    $select.attr('name', newName);
                    // Reinitialize select2 if it was initialized
                    if ($select.hasClass('select2-hidden-accessible')) {
                        $select.select2('destroy');
                    }
                    $select.select2();
                    populateSelect2Pages($select);
                }
            });
        });
    }

    // Initialize and populate select2 dropdowns with pages
    function initializeSelect2() {
        $('.addMoreSlider select.select2[name*="[page]"], .addMoreSliderNepali select.select2[name*="[page]"]').each(
            function() {
                let $select = $(this);
                if (!$select.hasClass('select2-hidden-accessible')) {
                    $select.select2();
                    populateSelect2Pages($select);
                }
            });
    }

    // Populate select2 dropdown with pages data
    function populateSelect2Pages($select) {
        if (pagesData && pagesData.length > 0) {
            let currentValue = $select.val() || '0';
            // Clear existing options except "None"
            $select.find('option:not([value="0"])').remove();
            // Add pages
            pagesData.forEach(function(page) {
                let option = new Option(page.post_title, page.id, false, false);
                $select.append(option);
            });
            $select.val(currentValue).trigger('change');
        }
    }

    // Initialize Summernote editor on new textareas - English section
    function initializeSummernote() {
        $('.addMoreSlider textarea.editor').each(function() {
            let $textarea = $(this);
            // Check if Summernote is already initialized on this textarea
            if (!$textarea.next('.note-editor').length && !$textarea.data('summernote')) {
                $textarea.summernote({
                    tabsize: 2,
                    height: 400,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['lineheight', ['lineheight']],
                        ['view', ['codeview', 'help']]
                    ],
                    fontSizes: ['8', '10', '12', '14', '16', '18', '24', '36'],
                    lineHeights: ['1.0', '1.2', '1.4', '1.5', '1.6', '1.8', '2.0', '3.0'],
                    callbacks: {
                        onImageUpload: function(files) {
                            const editor = $(this);
                            uploadImage(files[0], editor);
                        }
                    }
                });
            }
        });
    }
</script>
