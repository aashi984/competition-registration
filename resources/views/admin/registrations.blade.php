<!DOCTYPE html>
<html>
<head>
    <title>Registrations List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">List of Registrations</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($registrations->isEmpty())
        <p>No registrations found.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>College</th>
                    <th>Year</th>
                    <th>Department</th>
                    <th>Domain</th>
                    <th>Registered At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registrations as $registration)
                    <tr>
                        <td>{{ $registration->id }}</td>
                        <td>{{ $registration->name }}</td>
                        <td>{{ $registration->email }}</td>
                        <td>{{ $registration->contact_number }}</td>
                        <td>{{ $registration->gender }}</td>
                        <td>{{ $registration->country }}</td>
                        <td>{{ $registration->college }}</td>
                        <td>{{ $registration->year }}</td>
                        <td>{{ $registration->department }}</td>
                        <td>{{ $registration->domain }}</td>
                        <td>{{ $registration->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
