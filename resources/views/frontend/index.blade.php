<!-- resources/views/components/frontend/index.blade.php -->

<x-app-web-layout>

    <x-slot:title>
        Custom Title
    </x-slot>

    <div class="py-5 text-center">
        <div class="container">

            @php 
                $successMessageNew = "Saved Successfully";
                $type = "danger";
            @endphp

            <x-alert-message :type="$type" :message="$successMessageNew" />

            <hr>

            <h4>Welcome to Index Page</h4>

            <hr>

            <x-form.label value="My First Name" />

            <x-form.label>
                Laravel Migration Tutorial with example - All about migrations in Laravel 10
            </x-form.label>    

        </div>

    </div>

    <x-slot name="scripts">
        <script>
            // alert('this is my script area');
        </script>
    </x-slot>

</x-app-web-layout>

