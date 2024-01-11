<!-- resources/views/components/alert-message.blade.php -->

<div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }}>

    <h5>{{ $message }}</h5>

</div>
