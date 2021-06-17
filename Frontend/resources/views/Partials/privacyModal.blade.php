<div id="modalSing" class="modal fade ModalMore ModalPrivacy" role="dialog">
    <div class="modal-dialog">
                    
        <div class="modal-content">

            <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="desc">
                	@php
                    $privacyContent = \App\Models\Page::NotDeleted()->where('status',1)->where('title','سياسة الخصوصية')->first();
                    @endphp
                    @if($privacyContent)
                    {!! $privacyContent->description !!}
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>