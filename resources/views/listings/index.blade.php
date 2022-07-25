
{{-- Without blade
<h1><?php echo $heading; ?></h1>

<?php
foreach ($listings as $listing):?>
<h2><?php echo $listing['title'] ?></h2>
<p><?php echo $listing['description'] ?></p>
<?php endforeach ?> --}}

{{-- With blade --}}
{{-- @php
$num = 1;
@endphp
{{$num}} --}}

<x-layout >
@include('partials._hero')
@include('partials._search')
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>

{{-- @if(count($listings) == 0)
<p>NO LISTING FOUND</p>
@else
<p>yes</p>
@endif --}}


@unless(count($listings) == 0)
@foreach ($listings as $listing)

{{-- create component to pass values --}}
<x-listing-card :listing="$listing" />
@endforeach 

@else
<p>NO LISTING FOUND</p>
@endunless

</div>

</x-layout>