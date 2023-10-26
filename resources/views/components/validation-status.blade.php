@php
    $status = session('status');
    $errors = $errors->all();
@endphp

@if ($status || count($errors) > 0)
    <div {{ $attributes->merge(['class' => 'alert']) }}>
        @if ($status)
            <div class="alert-success">{{ $status }}</div>
        @endif

        @if (count($errors) > 0)
            <!-- <div class="font-medium text-green-500">{{ __('Sorry, I found this errors.') }}</div> -->
            <ul class="text-sm text-red-600">
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endif