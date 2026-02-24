<div class="row mb-3">

    {{-- Details --}}
    <div class="mb-3">
        <label class="form-label">Options Details</label>
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th class="custom-table-sno" style="width:5%">S.No</th>
                        <th style="width:25%">Title</th>
                        <th style="width:10%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="addMoreContact">
                    @isset($metaDatas['contact_details'])
                        @php
                            $contactDetails = unserialize($metaDatas['contact_details']);
                        @endphp
                           
                           

                        @foreach ($contactDetails as $index => $item)
                            {{-- Fixed variable name --}}
                            <tr>
                                <td class="custom-table-no">{{ $loop->iteration }}</td>
                                <td>
                                    <input type="text" name="contact_details[{{ $index }}][title]"
                                        class="form-control" value="{{ isset($item['title']) ? $item['title'] : '' }}" />
                                </td>
                               
                                <td class="text-center">
                                    <a href="javascript:void(0);" class="text-success fs-16 px-1 add_more_contact">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="text-danger fs-16 px-1 remove_contact">
                                        <i class="bi bi-x-circle"></i>
                                    </a>
                                    <hr>
                                    <a href="javascript:void(0);" class="text-primary fs-16 px-1 move-up" title="Move Up">
                                        <i class="bi bi-arrow-up-circle"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="text-primary fs-16 px-1 move-down"
                                        title="Move Down">
                                        <i class="bi bi-arrow-down-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <div class="text-end mt-2">
                <button type="button" class="btn btn-primary btn-sm add_contact">Add
                    Option</button>
            </div>
        </div>
    </div>


</div>
@include('backend.templates-pages.contact.contact-repeater')
