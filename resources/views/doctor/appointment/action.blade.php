@if ($appointments->status == 'pending')
    <a href="{{ route('doctor.appointment.accept', $appointments->id) }}" class="btn btn-success btn-sm">Accept</a>

    <a href="{{ route('doctor.appointment.reject', $appointments->id) }}" class="btn btn-danger btn-sm">Reject</a>
@endif

@if ($appointments->status != 'pending')
    <a href="{{ route('doctor.appointment.view', $appointments->id) }}" class="btn btn-info btn-sm">
        <i class="fa fa-eye"></i>
        View</a>
@endif
