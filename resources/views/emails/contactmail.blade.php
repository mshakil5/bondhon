
@component('mail::message')

<h3>Dear,</h3> 
<p>
    This is contact form mail from {{$array['name']}}. 
</p>
<p>Here is the details:</p>
@component('mail::table')
|          |           |
|:------:  |:---------:|

Name: {{$array['name']}}, <br>
Email: {{$array['email']}}, <br>
Subject: {{$array['subject']}}, <br>

@endcomponent


<p>{!! $array['message']  !!}</p>


Thanks,<br>
<a href="https://www.aidmeuk.com" target="blank">AidMeUk</a>

@endcomponent