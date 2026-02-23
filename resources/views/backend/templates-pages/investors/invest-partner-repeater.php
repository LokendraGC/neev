<script>
    // Download section - slider
    $(document).on('click', '.add_partner', function () {
        let row = addSliderRow();
        $('.addMorePartner').append(row);
        updateSerialNumbersSlider();
        updateOrderFields();
        initializeSummernote();
    });

    $(document).on('click', '.add_more_partner', function () {
        let clickedRow = $(this).closest('tr');
        let row = addSliderRow();
        clickedRow.after(row);
        updateSerialNumbersSlider();
        updateOrderFields();
        initializeSummernote();
    });

    $('.addMorePartner').delegate('.remove_partner', 'click', function () {
        $(this).parent().parent().remove();
        updateSerialNumbersSlider();
        updateOrderFields();
    });

    // Move row up - Download section
    $(document).on('click', '.addMorePartner .move-up', function () {
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
    $(document).on('click', '.addMorePartner .move-down', function () {
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
    let numberOfRow = $('.addMorePartner tr').length;
    let tr = `
    <tr>
        <td class="custom-table-no no">${numberOfRow + 1}</td>
       
        <td>
            <input type="text" name="partner_details[${numberOfRow}][title]" class="form-control" value="" />
        </td>
        <td>
            <input type="text" name="partner_details[${numberOfRow}][sub_title]" class="form-control" value="" />
        </td>
        <td>
            <div class="media-input image-input">
                <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="partner_details_${numberOfRow}_image" data-select="single">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                    </div>
                    <div class="form-control file-amount">Choose File</div>
                </div>
                <div class="preview-closer">
                    <input type="hidden" id="partner_details_${numberOfRow}_image" name="partner_details[${numberOfRow}][image]" class="selected-files" value="" />
                    <div id="partner_details_${numberOfRow}_image_select"></div>
                </div>
            </div>
        </td>
        <!-- REMOVED THE EXTRA EMPTY TD HERE -->
        <td class="text-center">
            <a href="javascript:void(0);" class="text-success fs-16 px-1 add_more_partner">
                <i class="bi bi-plus-circle"></i>
            </a>
            <a href="javascript:void(0);" class="text-danger fs-16 px-1 remove_partner">
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
        $('.addMorePartner tr').each(function (index) {
            $(this).find('.custom-table-no').text(index + 1);
        });
    }

    function updateOrderFields() {
        $('.addMorePartner tr').each(function (index) {
            $(this).find('.row-order').val(index);
        });
    }

    function updateRowIndices() {
        $('.addMorePartner tr').each(function (index) {
            let $row = $(this);

            // Update all name attributes to use the new index
            $row.find('input, textarea, select').each(function () {
                let $element = $(this);
                let currentName = $element.attr('name');

                if (currentName && currentName.includes('partner_details[')) {
                    let newName = currentName.replace(/partner_details\[\d+\]/, `partner_details[${index}]`);
                    $element.attr('name', newName);
                }

                // Update IDs for image and PDF fields
                let currentId = $element.attr('id');
                if (currentId && currentId.includes('partner_details')) {
                    if (currentId.includes('_image')) {
                        let newId = currentId.replace(/partner_details_\d+_image/, `partner_details_${index}_image`);
                        $element.attr('id', newId);
                    } else if (currentId.includes('_pdf')) {
                        let newId = currentId.replace(/partner_details_\d+_pdf/, `partner_details_${index}_pdf`);
                        $element.attr('id', newId);
                    }
                }
            });

            // Update data-field attributes for media manager
            $row.find('.open-media-manager').each(function () {
                let $mediaManager = $(this);
                let currentField = $mediaManager.attr('data-field');
                if (currentField && currentField.includes('partner_details')) {
                    if (currentField.includes('_image')) {
                        let newField = currentField.replace(/partner_details_\d+_image/, `partner_details_${index}_image`);
                        $mediaManager.attr('data-field', newField);
                    } else if (currentField.includes('_pdf')) {
                        let newField = currentField.replace(/partner_details_\d+_pdf/, `partner_details_${index}_pdf`);
                        $mediaManager.attr('data-field', newField);
                    }
                }
            });

 
        });
    }

    // Initialize Summernote editor on new textareas - Download section (not needed for resources, but kept for compatibility)
    function initializeSummernote() {
        // No textarea editors in resources page
        return;
        $('.addMorePartner textarea.editor').each(function () {
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
                        onImageUpload: function (files) {
                            const editor = $(this);
                            uploadImage(files[0], editor);
                        }
                    }
                });
            }
        });
    }


</script>