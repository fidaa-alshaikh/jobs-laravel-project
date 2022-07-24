
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

<h1>{{$heading}}</h1>

@if(count($listings) == 0)
<p>NO LISTING FOUND</p>
@else
<p>yes</p>
@endif


@unless(count($listings) == 0)
@foreach ($listings as $listing)
<h2>
    <a href="/listing/{{$listing['id']}}"> {{$listing['title']}} </a></h2>
<p>{{$listing['description']}}</p>
@endforeach 

@else
<p>NO LISTING FOUND</p>
@endunless