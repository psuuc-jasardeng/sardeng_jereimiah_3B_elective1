<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>

    <style>
      
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        hr {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px 0;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        button {
            width: 100%;
            background-color: #000080 ;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #000080 ;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Personal Information</h1>
        <hr>

        @if(session('success'))
            <p class="text-green-500" style="color: green; text-align: center;">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('Form') }}" method="post">
            @csrf
            <table>
                <tbody>
                    <tr>
                        <td><label for="firstname">First Name</label></td>
                        <td><input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}"></td>
                    </tr>
                    @error('firstname')
                        <tr>
                            <td></td>
                            <td class="error">{{ $message }}</td>
                        </tr>
                    @enderror

                    <tr>
                        <td><label for="lastname">Last Name</label></td>
                        <td><input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}"></td>
                    </tr>
                    @error('lastname')
                        <tr>
                            <td></td>
                            <td class="error">{{ $message }}</td>
                        </tr>
                    @enderror

                    <tr>
                        <td><label>Sex</label></td>
                        <td>
                            <input type="radio" name="Sex" value="male" id="male">
                            <label for="male">Male</label>
                            <input type="radio" name="Sex" value="female" id="female">
                            <label for="female">Female</label>
                        </td>
                    </tr>
                    @error('Sex')
                        <tr>
                            <td></td>
                            <td class="error">{{ $message }}</td>
                        </tr>
                    @enderror

                    <tr>
                        <td><label for="Mobilephone">Mobile Phone</label></td>
                        <td><input type="text" name="Mobilephone" id="Mobilephone" value="{{ old('Mobilephone') }}"></td>
                    </tr>
                    @error('Mobilephone')
                        <tr>
                            <td></td>
                            <td class="error">{{ $message }}</td>
                        </tr>
                    @enderror

                    <tr>
                        <td><label for="Telephone-Number">Tel No.</label></td>
                        <td><input type="text" name="Telephone-Number" id="Telephone-Number" value="{{ old('Telephone-Number') }}"></td>
                    </tr>
                    @error('Telephone-Number')
                        <tr>
                            <td></td>
                            <td class="error">{{ $message }}</td>
                        </tr>
                    @enderror

                    <tr>
                        <td><label for="Birthdate">Birth date</label></td>
                        <td><input type="date" name="Birthdate" id="Birthdate" value="{{ old('Birthdate') }}">
                        </td>
                    </tr>
                    @error('Birthdate')
                        <tr>
                            <td></td>
                            <td class="error">{{ $message }}</td>
                        </tr>
                    @enderror

                    <tr>
                        <td><label for="Address">Address</label></td>
                        <td><input type="text" name="Address" id="Address" value="{{ old('Address') }}"></td>
                    </tr>
                    @error('Address')
                        <tr>
                            <td></td>
                            <td class="error">{{ $message }}</td>
                        </tr>
                    @enderror

                    <tr>
                        <td><label for="Email">Website URL</label></td>
                        <td><input type="url" name="Website" id="Website" value="{{ old('Website') }}">
                        </td>
                    </tr>
                    @error('Email')
                        <tr>
                            <td></td>
                            <td class="error">{{ $message }}</td>
                        </tr>
                    @enderror
                </tbody>
            </table>

            <div class="mt-3">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>
