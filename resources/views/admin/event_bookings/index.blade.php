@extends('layouts.admin.main')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Event Bookings</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <tr>
                            <th>ID</th>
                            <th>Event</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>People</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ optional($booking->event)->title }}</td>
                                <td>{{ $booking->name }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->people }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>{{ $booking->created_at?->format('d-M-Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('event-bookings.updateStatus', $booking) }}" method="POST" class="d-inline">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()">
                                            <option value="pending" @if($booking->status === 'pending') selected @endif>Pending</option>
                                            <option value="confirmed" @if($booking->status === 'confirmed') selected @endif>Confirmed</option>
                                            <option value="cancelled" @if($booking->status === 'cancelled') selected @endif>Cancelled</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">No event bookings yet.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


