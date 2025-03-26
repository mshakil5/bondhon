@extends('admin.layouts.admin')

@section('content')
<div class="container pt-3 pb-5">
    <h2 class="my-4">Section Status</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('updateSectionStatus') }}" method="POST">
        @csrf

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Section</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Slider</td>
                    <td>
                        <select name="slider" id="slider" class="form-control">
                            <option value="1" {{ $status->slider ? 'selected' : '' }}>On</option>
                            <option value="0" {{ !$status->slider ? 'selected' : '' }}>Off</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Donation</td>
                    <td>
                        <select name="donation" id="donation" class="form-control">
                            <option value="1" {{ $status->donation ? 'selected' : '' }}>On</option>
                            <option value="0" {{ !$status->donation ? 'selected' : '' }}>Off</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Our Activities</td>
                    <td>
                        <select name="our_activities" id="our_activities" class="form-control">
                            <option value="1" {{ $status->our_activities ? 'selected' : '' }}>On</option>
                            <option value="0" {{ !$status->our_activities ? 'selected' : '' }}>Off</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>About Us</td>
                    <td>
                        <select name="about_us" id="about_us" class="form-control">
                            <option value="1" {{ $status->about_us ? 'selected' : '' }}>On</option>
                            <option value="0" {{ !$status->about_us ? 'selected' : '' }}>Off</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Blog</td>
                    <td>
                        <select name="blog" id="blog" class="form-control">
                            <option value="1" {{ $status->blog ? 'selected' : '' }}>On</option>
                            <option value="0" {{ !$status->blog ? 'selected' : '' }}>Off</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Partners</td>
                    <td>
                        <select name="partners" id="partners" class="form-control">
                            <option value="1" {{ $status->partners ? 'selected' : '' }}>On</option>
                            <option value="0" {{ !$status->partners ? 'selected' : '' }}>Off</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-secondary">Update Status</button>
    </form>
</div>
@endsection