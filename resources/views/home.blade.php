@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js']);

    <title>Web Pemilihan Ketua BEM</title>
</head>

<body style="margin: 0; padding:0;">

    <div
        style="display: flex; flex-direction:column; align-items: center; 
    justify-content: center; width:100%; text-align:center;
    ">

        {{-- Navbar --}}
        <div style="width:100% ; background-color: white; position: fixed; top:0;
    box-shadow: -1px 5px 17px 0px rgba(0,0,0,0.21); -webkit-box-shadow: -1px 5px 17px 0px rgba(0,0,0,0.21); -moz-box-shadow: -1px 5px 17px 0px rgba(0,0,0,0.21);"
            class=" flex justify-center items-center">

            <div style="width: 80%; padding:10px" class=" flex justify-between items-center">

                <img src="{{ asset('images/logo_upi.jpg') }}" width="50" height="50" />

                <div class=" flex" style="gap: 40px">
                    <h1 class=" mr-10">{{ $username }}</h1>
                    <a href="/logout">
                        Logout
                    </a>
                </div>

            </div>

        </div>
        {{-- Navbar --}}

        {{-- Content --}}
        <div style="width: 80%; margin-top:80px; padding-bottom:30px" class=" flex justify-center items-center flex-col">
            <h1><strong>Selamat Datang!</strong> <br> 
                <span style="color: red">Website Pemilihan Ketua BEM</span></h1>
            <h2 style="width: 800px">
                Pemilihan Ketua Badan Eksekutif Mahasiswa (BEM) adalah momen penting di mana kita, mahasiswa, memiliki
                kesempatan untuk memilih pemimpin yang akan memimpin perubahan di kampus kita. Mari bersama-sama menjadi
                bagian dari perubahan dan membentuk masa depan kampus yang lebih baik.
            </h2>

            <div style="display:flex; gap:10px;">
                @foreach ($calon as $val)
                    <div style="margin-top: 10px; display: flex;">

                        <div
                            style="border: 2px solid black; min-height:430px; min-width:400px;
                        align-items: center; display:flex; justify-content: center; flex-direction:column;">
                            <img src="{{ asset('images/man1.png') }}" width="200" />

                            <div>
                                <p>{{ $val->id }}</p>
                                <p>{{ $val->nama_ketua }} & {{ $val->nama_wakil }}</p>
                                <p>{{ $val->misi }}</p>

                                {{-- POST --}}
                                <form method="post">
                                    @csrf
                                    <input type="hidden" name="calons_id" value="{{ $val->id }}">
                                    <button type="submit" style="width: 130px; height: 30px; border:1px solid black; border-radius:5px; 
                                    background-color:#4CAF50;
                                    ">Pilih Ini</button>
                                </form>
                                {{-- POST --}}
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

    </div>
    {{-- Content --}}

    </div>
</body>

</html>
