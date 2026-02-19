var r;(function(e){r={init:function(){this.remove_thumbnail()},ie:function(){try{if(/MSIE (\d+\.\d+);/.test(navigator.userAgent)||navigator.userAgent.match(/Trident.*rv\:11\./))return e("body").addClass("ie-user"),!0}catch(a){console.log(a)}return!1},dropzone_container:()=>{e("#image").dropzone({uploadprogress:function(a,t,i){e("button[type=submit]").prop("disabled",!0)},url:"/temp-images",maxFiles:10,paramName:"image",addRemoveLinks:!0,acceptedFiles:"image/jpeg,image/png,image/gif",headers:{"X-CSRF-TOKEN":e('meta[name="csrf-token"]').attr("content")},success:function(a,t){var i=`<div class="col-md-3 mb-3" id="product-image-row-${t.image_id}">
                            <div class="card image-card">
                                <a href="#" onclick="deleteImage(${t.image_id});" class="btn btn-danger">Delete</a>
                                <img src="${t.imagePath}" alt="" class="w-100 card-img-top">
                                <div class="card-body">
                                    <input type="text" name="caption[]"  value="" class="form-control"/>
                                    <input type="hidden" name="image_id[]" value="${t.image_id}"/>
                                </div>
                            </div>
                        </div>`;e("#image-wrapper").append(i),e("button[type=submit]").prop("disabled",!1)}})},remove_thumbnail:()=>{e(document).on("click",".remove-attachment",function(){var a=e(this).data("slug");console.log("asd");var t=e(this).data("id"),i=e("#"+a).val();if(i){var n=i.split(",").filter(function(o){return o!=t}).join(",");e("#"+a).val(n)}e(this).closest(".file-preview").remove()})}},e(function(){r.init()})})(jQuery);
