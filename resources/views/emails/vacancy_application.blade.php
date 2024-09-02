@component('mail::message')
# New Vacancy Application

You have received a new application for the position of **{{ $application->vacancy }}**.

**Name:** {{ $application->name }}  
**Phone:** {{ $application->phone }}  
**Country:** {{ $application->country }}

**Message:**  
{{ $application->message }}

@component('mail::button', ['url' => ''])
Download CV
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
