@extends('layouts.template')
@section('content')
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>

    <div class="container rounded bg-white border shadow-sm p-4" style="max-width: 800px; background-color: #ffe6f7;">
        <div class="row" id="profile">
            <div class="col-md-4 border-right">
                <div class="p-3 py-5 text-center">
                    <div class="d-flex flex-column align-items-center text-center p-3 ">
                        <img class="mt-3 mb-2 shadow-sm" width="200px" src="{{ asset($user->foto) }}" alt="Tidak ada foto"
                            style="border: 4px solid #ff80bf;">
                    </div>
                    <div onclick="modalAction('{{ url('/profile/' . session('user_id') . '/edit_foto') }}')" class="mt-4">
                        <button class="btn btn-pink profile-button" type="button" style="transition: 0.3s; background-color: #ff80bf; color: white;">
                            Edit Foto
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="p-3 py-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right font-weight-bold" style="color: #ff80bf;">Profile Settings</h4>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-muted">ID</label>
                                <div class="p-2 bg-white rounded shadow-sm" style="font-size: 18px;">
                                    {{ $user->user_id }}
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="text-muted">Level</label>
                                <div class="p-2 bg-white rounded shadow-sm" style="font-size: 18px;">
                                    {{ $user->level->level_nama }}
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="text-muted">Username</label>
                                <div class="p-2 bg-white rounded shadow-sm" style="font-size: 18px;">
                                    {{ $user->username }}
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="text-muted">Nama</label>
                                <div class="p-2 bg-white rounded shadow-sm" style="font-size: 18px;">
                                    {{ $user->nama }}
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="text-muted">Password</label>
                                <div class="p-2 bg-white rounded shadow-sm" style="font-size: 18px;">
                                    ********
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <button onclick="modalAction('{{ url('/profile/' . session('user_id') . '/edit_ajax') }}')"
                            class="btn btn-gradient profile-button" style="transition: 0.3s;">
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .btn-pink {
            background-color: #ff80bf;
            border-color: #ff80bf;
            border-radius: 30px;
        }

        .btn-pink:hover {
            background-color: #ff4da6;
            border-color: #ff4da6;
        }

        .profile-button:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(255, 128, 191, 0.4);
        }

        .btn-gradient {
            background: linear-gradient(135deg, #ff80bf, #ff4da6);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #ff4da6, #ff80bf);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .shadow-sm {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
        }

        .rounded {
            border-radius: 10px !important;
        }
    </style>
@endpush

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
    </script>
@endpush