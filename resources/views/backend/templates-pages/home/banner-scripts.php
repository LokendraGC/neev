<script>
    //slider
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

    // Move row up
    $(document).on('click', '.move-up', function() {
        let currentRow = $(this).closest('tr');
        let prevRow = currentRow.prev('tr');

        if (prevRow.length) {
            currentRow.insertBefore(prevRow);
            updateSerialNumbersSlider();
            updateOrderFields();
            updateRowIndices();
        }
    });

    // Move row down
    $(document).on('click', '.move-down', function() {
        let currentRow = $(this).closest('tr');
        let nextRow = currentRow.next('tr');

        if (nextRow.length) {
            currentRow.insertAfter(nextRow);
            updateSerialNumbersSlider();
            updateOrderFields();
            updateRowIndices();
        }
    });

    function addSliderRow() {
        let numberOfRow = $('.addMoreSlider tr').length;

        let tr = `
        <tr>
            <td class="custom-table-no no">${numberOfRow + 1}</td>
            <td>
                <div class="media-input image-input mt-2">
                    <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="banners${numberOfRow}_image" data-select="single">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose File</div>
                    </div>
                    <div class="preview-closer">
                        <input type="hidden" id="banners${numberOfRow}_image" name="banners[${numberOfRow}][image]" class="selected-files" value="" />
                        <div id="banners${numberOfRow}_image_select"></div>
                    </div>
                </div>
                <div class="media-input video-input mt-2" style="display:none;">
                    <label>Background Video</label>
                    <input type="text" class="form-control"
                        name="banners[${numberOfRow}][video_url]"
                        placeholder="Enter video URL">
                </div>
            </td>
            <td>
                <label for="banner_title_${numberOfRow}">Title</label>
                <input style="width: 100%;" type="text" class="form-control" id="banner_title_${numberOfRow}" name="banners[${numberOfRow}][title]" value="" />
                <input type="hidden" class="row-order" name="banners[${numberOfRow}][order]" value="${numberOfRow}" />
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

                if (currentName && currentName.includes('banners[')) {
                    let newName = currentName.replace(/banners\[\d+\]/, `banners[${index}]`);
                    $element.attr('name', newName);
                }

                // Update IDs for image fields
                let currentId = $element.attr('id');
                if (currentId && currentId.includes('banners')) {
                    let newId = currentId.replace(/banners\d+/, `banners${index}`);
                    $element.attr('id', newId);
                }
            });

            // Update data-field attributes for media manager
            $row.find('.open-media-manager').each(function() {
                let $mediaManager = $(this);
                let currentField = $mediaManager.attr('data-field');
                if (currentField && currentField.includes('banners')) {
                    let newField = currentField.replace(/banners\d+/, `banners${index}`);
                    $mediaManager.attr('data-field', newField);
                }
            });

            // Update div IDs for image select
            $row.find('div[id*="banners"][id*="_image_select"]').each(function() {
                let $div = $(this);
                let currentId = $div.attr('id');
                if (currentId) {
                    let newId = currentId.replace(/banners\d+/, `banners${index}`);
                    $div.attr('id', newId);
                }
            });
        });
    }

    $(document).on('change', '.media-type', function() {
        let $row = $(this).closest('td');
        let selectedType = $(this).val();

        $row.find('.media-input').hide(); // Hide both
        if (selectedType === 'image') {
            $row.find('.image-input').show();
        } else {
            $row.find('.video-input').show();
        }
    });
</script>