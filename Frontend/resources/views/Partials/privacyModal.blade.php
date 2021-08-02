<div id="modalSing" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
                    
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
                <div class="clearfix"></div>
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