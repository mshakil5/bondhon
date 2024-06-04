
@component('mail::message')

<h3>Dear Mr {{$array['name']}},</h3> 

<p>
    {!! $array['message'] !!}
</p>

<a href="https://www.bondhon.com" target="blank">bondhon</a>

@endcomponent