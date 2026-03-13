<script>
    // Download section - slider
    $(document).on('click', '.add_sustainability', function () {
        let row = addSliderRow();
        $('.addMoreSustainability').append(row);
        updateSerialNumbersSlider();
        updateOrderFields();
        initializeSummernote();
    });

    $(document).on('click', '.add_more_sustainability', function () {
        let clickedRow = $(this).closest('tr');
        let row = addSliderRow();
        clickedRow.after(row);
        updateSerialNumbersSlider();
        updateOrderFields();
        initializeSummernote();
    });

    $('.addMoreSustainability').delegate('.remove_sustainability', 'click', function () {
        $(this).parent().parent().remove();
        updateSerialNumbersSlider();
        updateOrderFields();
    });

    // Move row up - Download section
    $(document).on('click', '.addMoreSustainability .move-up', function () {
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
    $(document).on('click', '.addMoreSustainability .move-down', function () {
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
    let numberOfRow = $('.addMoreSustainability tr').length;
    let tr = `
    <tr>
        <td class="custom-table-no no">${numberOfRow + 1}</td>
       
        <td>
            <input type="text" name="sustainability_details[${numberOfRow}][title]" class="form-control" value="" />
        </td>
        <td>
                <textarea class="editor sustainability-editor" id="sustainability_editor_${numberOfRow}" name="sustainability_details[${numberOfRow}][description]"></textarea>
        </td>
        <td>
            <div class="media-input image-input">
                <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="sustainability_details_${numberOfRow}_image" data-select="single">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                    </div>
                    <div class="form-control file-amount">Choose File</div>
                </div>
                <div class="preview-closer">
                    <input type="hidden" id="sustainability_details_${numberOfRow}_image" name="sustainability_details[${numberOfRow}][image]" class="selected-files" value="" />
                    <div id="sustainability_details_${numberOfRow}_image_select"></div>
                </div>
            </div>
        </td>
        <!-- REMOVED THE EXTRA EMPTY TD HERE -->
        <td class="text-center">
            <a href="javascript:void(0);" class="text-success fs-16 px-1 add_more_sustainability">
                <i class="bi bi-plus-circle"></i>
            </a>
            <a href="javascript:void(0);" class="text-danger fs-16 px-1 remove_sustainability">
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
        $('.addMoreSustainability tr').each(function (index) {
            $(this).find('.custom-table-no').text(index + 1);
        });
    }

    function updateOrderFields() {
        $('.addMoreSustainability tr').each(function (index) {
            $(this).find('.row-order').val(index);
        });
    }

    function updateRowIndices() {
        $('.addMoreSustainability tr').each(function (index) {
            let $row = $(this);

            // Update all name attributes to use the new index
            $row.find('input, textarea, select').each(function () {
                let $element = $(this);
                let currentName = $element.attr('name');

                if (currentName && currentName.includes('sustainability_details[')) {
                    let newName = currentName.replace(/sustainability_details\[\d+\]/, `sustainability_details[${index}]`);
                    $element.attr('name', newName);
                }

                // Update IDs for image, PDF, and editor fields
                let currentId = $element.attr('id');
                if (currentId) {
                    if (currentId.includes('sustainability_details_') && currentId.includes('_image')) {
                        $element.attr('id', `sustainability_details_${index}_image`);
                    } else if (currentId.includes('sustainability_details_') && currentId.includes('_pdf')) {
                        $element.attr('id', `sustainability_details_${index}_pdf`);
                    } else if (currentId.includes('sustainability_editor_')) {
                        $element.attr('id', `sustainability_editor_${index}`);
                    }
                }
            });

            // Update data-field attributes for media manager
            $row.find('.open-media-manager').each(function () {
                let $mediaManager = $(this);
                let currentField = $mediaManager.attr('data-field');
                if (currentField && currentField.includes('sustainability_details')) {
                    if (currentField.includes('_image')) {
                        let newField = currentField.replace(/sustainability_details_\d+_image/, `sustainability_details_${index}_image`);
                        $mediaManager.attr('data-field', newField);
                    } else if (currentField.includes('_pdf')) {
                        let newField = currentField.replace(/sustainability_details_\d+_pdf/, `sustainability_details_${index}_pdf`);
                        $mediaManager.attr('data-field', newField);
                    }
                }
            });

            // Update preview div IDs for media manager
            $row.find('[id^="sustainability_details_"][id$="_image_select"]').each(function () {
                let $previewDiv = $(this);
                let newId = `sustainability_details_${index}_image_select`;
                $previewDiv.attr('id', newId);
            });
        });
    }

    // Initialize Summernote editor on sustainability repeater textareas
    function initializeSummernote() {
        $('.addMoreSustainability textarea.sustainability-editor').each(function () {
            let $textarea = $(this);
            if (!$textarea.next('.note-editor').length && !$textarea.data('summernote')) {
                $textarea.summernote({
                    tabsize: 2,
                    height: 200,
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
                        onImageUpload: function (files) {
                            const editor = $(this);
                            if (typeof uploadImage === 'function') {
                                uploadImage(files[0], editor);
                            }
                        }
                    }
                });
            }
        });
    }


</script>