@push('extended-css')
    <style>
        .breadcrumb{
            background: transparent;
        }
        .breadcrumb-outer{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-right:30px;
            text-transform: capitalize; 
        }
    </style>
@endpush
<div class="breadcrumb-outer">
    <div class="breadcrumb flat">
        <?php $segments = ''; ?>
            @foreach (Request::segments() as $segment)
                <?php $segments .= $segment . ' '; ?>
            @endforeach

            <h4 class="py-3 mb-4">{{ rtrim($segments) }}</h4>

    </div>
    <div class="add-record-btn">
        @if ($modal == true)
          <button class="btn btn-primary btn-md openModal" data-toggle="modal"
         data-target="#{{ $modalId }}"><i class="mdi mdi-plus-circle-outline"></i> Add {{ $modalType }}</button>
        @endif
       @if($pageUrl)
       <a class="btn btn-primary btn-md addrecord" href="{{ $pageUrl }}"><i class="mdi mdi-plus-circle-outline"></i> Add {{ $modalType }}</a>
       @endif
    </div>
</div>
