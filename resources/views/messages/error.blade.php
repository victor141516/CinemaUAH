<div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="alert alert-danger">
            @if (session('error')) {{ session('error') }} @endif
        </div>
    </div>
</div>

@if (isset($messages))
<div class="row mrg-top">
    <div class="col-md-12">
        @foreach ($messages as $type => $ms)
            <div class="alert alert-{{ $type }}">
                <ul>
                @foreach ($ms as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endif

@if (count($errors) > 0)
<div class="row mrg-top">
    <div class="col-md-12">
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endif