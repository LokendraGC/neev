<script>
    // Download section - slider
    $(document).on('click', '.add_slider', function() {
        let row = addSliderRow();
        $('.addMoreSlider').append(row);
        updateSerialNumbersSlider();
        updateOrderFields();
        initializeSummernote();
    });

    $(document).on('click', '.add_more_slider', function() {
        let clickedRow = $(this).closest('tr');
        let row = addSliderRow();
        clickedRow.after(row);
        updateSerialNumbersSlider();
        updateOrderFields();
        initializeSummernote();
    });

    $('.addMoreSlider').delegate('.remove_slider', 'click', function() {
        $(this).parent().parent().remove();
        updateSerialNumbersSlider();
        updateOrderFields();
    });

    // Move row up - Download section
    $(document).on('click', '.addMoreSlider .move-up', function() {
        let currentRow = $(this).closest('tr');
        let prevRow = currentRow.prev('tr');

        if (prevRow.length) {
            currentRow.insertBefore(prevRow);
            updateSerialNumbersSlider();
            updateOrderFields();
            updateRowIndices();
            initializeSummernote();
        }
    });

    // Move row down - Download section
    $(document).on('click', '.addMoreSlider .move-down', function() {
        let currentRow = $(this).closest('tr');
        let nextRow = currentRow.next('tr');

        if (nextRow.length) {
            currentRow.insertAfter(nextRow);
            updateSerialNumbersSlider();
            updateOrderFields();
            updateRowIndices();
            initializeSummernote();
        }
    });

    function addSliderRow() {
        let numberOfRow = $('.addMoreSlider tr').length;

        let tr = `
        <tr>
            <td class="custom-table-no no">${numberOfRow + 1}</td>
           
            <td>
                <input type="text" name="resources_details[${numberOfRow}][title]" class="form-control" value="" />
            </td>
           
            <td>
                <div class="media-input image-input">
                    <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="resources_details_${numberOfRow}_image" data-select="single">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose File</div>
                    </div>
                    <div class="preview-closer">
                        <input type="hidden" id="resources_details_${numberOfRow}_image" name="resources_details[${numberOfRow}][image]" class="selected-files" value="" />
                        <div id="resources_details_${numberOfRow}_image_select"></div>
                    </div>
                </div>
            </td>
            <td>
                <label for="resources_details_${numberOfRow}_pdf" class="form-label">Upload PDF</label>
                <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="resources_details_${numberOfRow}_pdf" data-select="single">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                    </div>
                    <div class="form-control file-amount">Choose File</div>
                </div>
                <div class="preview-closer mt-2">
                    <input type="hidden" id="resources_details_${numberOfRow}_pdf" name="resources_details[${numberOfRow}][pdf]" class="selected-files" value="" />
                    <div id="resources_details_${numberOfRow}_pdf_select"></div>
                </div>
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

                if (currentName && currentName.includes('resources_details[')) {
                    let newName = currentName.replace(/resources_details\[\d+\]/, `resources_details[${index}]`);
                    $element.attr('name', newName);
                }

                // Update IDs for image and PDF fields
                let currentId = $element.attr('id');
                if (currentId && currentId.includes('resources_details')) {
                    if (currentId.includes('_image')) {
                        let newId = currentId.replace(/resources_details_\d+_image/, `resources_details_${index}_image`);
                        $element.attr('id', newId);
                    } else if (currentId.includes('_pdf')) {
                        let newId = currentId.replace(/resources_details_\d+_pdf/, `resources_details_${index}_pdf`);
                        $element.attr('id', newId);
                    }
                }
            });

            // Update data-field attributes for media manager
            $row.find('.open-media-manager').each(function() {
                let $mediaManager = $(this);
                let currentField = $mediaManager.attr('data-field');
                if (currentField && currentField.includes('resources_details')) {
                    if (currentField.includes('_image')) {
                        let newField = currentField.replace(/resources_details_\d+_image/, `resources_details_${index}_image`);
                        $mediaManager.attr('data-field', newField);
                    } else if (currentField.includes('_pdf')) {
                        let newField = currentField.replace(/resources_details_\d+_pdf/, `resources_details_${index}_pdf`);
                    $mediaManager.attr('data-field', newField);
                    }
                }
            });

            // Update div IDs for image and PDF select
            $row.find('div[id*="resources_details"]').each(function() {
                let $div = $(this);
                let currentId = $div.attr('id');
                if (currentId) {
                    if (currentId.includes('_image_select')) {
                        let newId = currentId.replace(/resources_details_\d+_image_select/, `resources_details_${index}_image_select`);
                        $div.attr('id', newId);
                    } else if (currentId.includes('_pdf_select')) {
                        let newId = currentId.replace(/resources_details_\d+_pdf_select/, `resources_details_${index}_pdf_select`);
                    $div.attr('id', newId);
                    }
                }
            });
        });
    }

    // Initialize Summernote editor on new textareas - Download section (not needed for resources, but kept for compatibility)
    function initializeSummernote() {
        // No textarea editors in resources page
        return;
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
