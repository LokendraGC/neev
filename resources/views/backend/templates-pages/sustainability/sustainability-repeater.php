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
            <textarea class="form-control" name="sustainability_details[${numberOfRow}][description]" rows="5"></textarea>
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

                // Update IDs for image and PDF fields
                let currentId = $element.attr('id');
                if (currentId && currentId.includes('sustainability_details')) {
                    if (currentId.includes('_image')) {
                        let newId = currentId.replace(/sustainability_details_\d+_image/, `sustainability_details_${index}_image`);
                        $element.attr('id', newId);
                    } else if (currentId.includes('_pdf')) {
                        let newId = currentId.replace(/sustainability_details_\d+_pdf/, `sustainability_details_${index}_pdf`);
                        $element.attr('id', newId);
                    }
                }
            });


 
        });
    }

    // Initialize Summernote editor on new textareas - Download section (not needed for resources, but kept for compatibility)
    function initializeSummernote() {
        // No textarea editors in resources page
        return;
        $('.addMoreSustainability textarea.editor').each(function () {
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