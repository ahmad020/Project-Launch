@extends('userDashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form class="wt-formtheme wt-formbanner wt-formbannervtwo wt-rightarea" method="GET">
                        <fieldset>
                            <div class="form-group">
                                <input type="text" name="search" class="form-control"
                                       value="{{ request()->get('search') }}" placeholder="Search By Title">
                                <div class="wt-formoptions">
                                    <button class="wt-searchbtn"><i class="lnr lnr-magnifier"></i></button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <h3 class="card-title">Approved Gigs</h3>

                    <div class="table-responsive">
                        <table class="table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Gig Title</th>
                                <th>Gig Category</th>
                                <th>Gig Price</th>
                                <th>Gig Duration</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($approvedGigs as $approvedGig)

                                <tr>
                                    <td>{{ $approvedGig->id }}</td>
                                    <td>{{ $approvedGig->title }}</td>
                                    <td>{{ $approvedGig->gigCategory->name }}</td>
                                    <td>{{ $approvedGig->amount. "$" }}</td>
                                    <td>{{ $approvedGig->duration. " Days" }}</td>

                                    @if ($approvedGig->status == '0')
                                        <td><span class="text-primary">Pending</span></td>
                                    @elseif ($approvedGig->status == '1')
                                        <td><span class="text-success">Apprroved</span></td>
                                    @elseif ($approvedGig->status == '2')
                                        <td><span class="text-danger">Canceled</span></td>
                                    @endif
                                    <td>
                                        <div class="btn-group " role="group" aria-label="Button group example">
                                            {{-- <div class="text-left"> --}}
                                            <a href="{{route('approvedGigsShow',$approvedGig->id)}}"
                                               class="btn btn-primary btn-sm p-2 m-1"><i
                                                    class="fa fa-eye mr-2"></i>View</a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <nav class="wt-pagination wt-savepagination">
                <ul>
                    <li> {!! $approvedGigs->links() !!}</li>
                </ul>

            </nav>
            <div class="wt-rightarea ">
                <a class="wt-btn" href="{{route('adminDashboard')}}"><i
                        class="fa fa-arrow-left"></i>Back</a>
            </div>
        </div>
    </div>
    {{-- pagination --}}
@endSection
