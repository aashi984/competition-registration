<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Competition Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
      {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(to top, #0f0c29, #302b63, #24243e);
    min-height: 100vh;
    overflow-x: hidden;
    overflow-y: auto;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 50px 20px;
}

/* SVG Waves */
.wave-blue,
.bottom-waves {
    position: absolute;
    width: 100%;
    z-index: 0;
    left: 0;
}

.wave-blue {
    top: 0;
}

.bottom-waves {
    bottom: 0;
}

/* Form Container */
.form-container {
    position: relative;
    z-index: 2;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 40px 35px;
    max-width: 600px;
    width: 100%;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.5);
    color: #ffffff;
}

/* Title */
h3 {
    text-align: center;
    color: #ffffff;
    font-size: 2rem;
    margin-bottom: 30px;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.4);
}

/* Labels & Inputs */
label {
    display: block;
    margin-top: 18px;
    font-weight: 600;
    color: #ffffff;
}

input[type="text"],
input[type="email"],
input[type="tel"],
select {
    width: 100%;
    padding: 12px 15px;
    margin-top: 8px;
    border-radius: 10px;
    border: none;
    outline: none;
    background: rgba(255, 255, 255, 0.15);
    color: #ffffff;
    font-size: 1rem;
    transition: background 0.3s, box-shadow 0.3s;
    box-shadow: inset 1px 1px 3px rgba(255, 255, 255, 0.1);
}


input:focus,
select:focus {
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid #a29bfe;
    box-shadow: 0 0 8px #a29bfe55;
    outline: none;
}


select option {
    background-color: #ffffff;
    color: #000000;
}

select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;utf8,<svg fill='white' height='20' viewBox='0 0 24 24' width='20' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1rem;
    padding-right: 2.5rem;
}

/* Submit Button */
.btn-submit {
    margin-top: 30px;
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #a29bfe, #6c5ce7);
    color: white;
    border: none;
    border-radius: 50px;
    font-weight: bold;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #8c7cfb, #5e52d3);
    transform: scale(1.02);
}

/* Alerts */
.alert {
    margin-top: 20px;
    padding: 14px;
    border-radius: 10px;
    font-weight: 500;
}

.alert-success {
    background-color: rgba(72, 239, 155, 0.2);
    color: #4CAF50;
}

.alert-danger {
    background-color: rgba(255, 107, 107, 0.2);
    color: #ff6b6b;
}

.email-error {
    color: #ff6b6b;
    font-size: 0.9rem;
    margin-top: 5px;
}
</style>
</head>
<body>

<!-- Top Wave -->
<div class="wave-blue">
    <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="#1e1b39" fill-opacity="1"
              d="M0,64L48,80C96,96,192,128,288,154.7C384,181,480,203,576,186.7C672,171,768,117,864,101.3C960,85,1056,107,1152,122.7C1248,139,1344,149,1392,154.7L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
        </path>
    </svg>
</div>

<!-- Bottom Wave -->
<div class="bottom-waves">
    <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="#2d274b" fill-opacity="1"
              d="M0,224L48,229.3C96,235,192,245,288,245.3C384,245,480,235,576,197.3C672,160,768,96,864,106.7C960,117,1056,203,1152,234.7C1248,267,1344,245,1392,234.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
</div>

<div class="form-container">
    <h3>Register for Competition 🚀</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST" id="registration-form">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" value="{{ old('name') }}">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="{{ old('email') }}">
        <div id="email-error" class="email-error"></div>

        <label for="contact">Contact Number:</label>
        <input type="tel" id="contact" name="contact_number" required pattern="[0-9]{10}" title="Enter a valid 10-digit number" value="{{ old('contact_number') }}">

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">--Select--</option>
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
        </select>

        <label for="country">Country:</label>
        <select id="country" name="country" required>
            <option value="">--Select Country--</option>
            @foreach($countries as $country)
                <option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
            @endforeach
        </select>

        <label for="college">College:</label>
        <select id="college" name="college" required>
            <option value="">--Select College--</option>
            @foreach($colleges as $college)
                <option value="{{ $college }}" {{ old('college') == $college ? 'selected' : '' }}>{{ $college }}</option>
            @endforeach
        </select>

        <label for="year">Year:</label>
        <select id="year" name="year" required>
            <option value="">--Select--</option>
            <option value="1st" {{ old('year') == '1st' ? 'selected' : '' }}>1st</option>
            <option value="2nd" {{ old('year') == '2nd' ? 'selected' : '' }}>2nd</option>
            <option value="3rd" {{ old('year') == '3rd' ? 'selected' : '' }}>3rd</option>
            <option value="4th" {{ old('year') == '4th' ? 'selected' : '' }}>4th</option>
        </select>

        <label for="domain">Domain / Department:</label>
        <input type="text" id="domain" name="domain" required value="{{ old('domain') }}">

        <button type="submit" class="btn-submit">Register</button>
    </form>
</div>

<script>
    // Email check 
    document.getElementById('email').addEventListener('blur', function () {
        const email = this.value;
        if (email) {
            fetch(/check-email?email=${email})
                .then(response => response.json())
                .then(data => {
                    const emailError = document.getElementById('email-error');
                    emailError.textContent = data.exists ? 'This email is already registered.' : '';
                });
        }
    });

    //validation messages
    const emailField = document.getElementById('email');
    emailField.addEventListener('invalid', function (e) {
        e.preventDefault();
        if (emailField.validity.valueMissing) {
            emailField.setCustomValidity('Please enter your email address.');
        } else if (emailField.validity.typeMismatch) {
            emailField.setCustomValidity('Please enter a valid email address.');
        }
    });

    emailField.addEventListener('input', function () {
        emailField.setCustomValidity('');
    });
</script>

</body>
</html>