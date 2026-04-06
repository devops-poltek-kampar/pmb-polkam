@extends('pmb.layout')


@section('content')
    <div class="row mt-3">

        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">

                {{ $dataTable->table() }}

            </div>
        </div>

    </div>

    @push('script')
        {{ $dataTable->scripts() }}

        <script>
            function ResetPassword(id) {
                Swal.fire({
                    title: "Masukan Password Baru!",
                    input: "password",
                    inputAttributes: {
                        autocapitalize: "off"
                    },
                    showCancelButton: true,
                    confirmButtonText: "Reset",
                    showLoaderOnConfirm: true,
                    preConfirm: async (newPassword) => {
                        $.ajax({
                            type: "PUT",
                            url: `{{ url('/pmb/data-user/reset-password') }}`,
                            data: {
                                id: id,
                                password: newPassword
                            },
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": `{{ csrf_token() }}`
                            },
                            success: function(response) {
                                // console.log(response);

                                if (response.status == 200) {
                                    Swal.fire({
                                        title: `${response.message}`,
                                        icon: 'success'
                                    });
                                }

                            }
                        });

                        //                     try {
                        //                         const githubUrl = `
                //     https://api.github.com/users/${login}
                //   `;
                        //                         const response = await fetch(githubUrl);
                        //                         if (!response.ok) return Swal.showValidationMessage(`
                //       ${JSON.stringify(await response.json())}
                //     `);
                        //                         return response.json();
                        //                     } catch (error) {
                        //                         Swal.showValidationMessage(`
                //     Request failed: ${error}
                //   `);
                        //                     }
                    },
                    // allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log("Konfirmasi");

                    }

                });
            }

            function setStatus(id, status) {

                console.log(status);

                // if (status == "Suspend") {
                Swal.fire({
                    title: status == "Suspend" ? "Aktifkan User?" : "Non Aktifkan User?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: status == "Suspend" ? "Aktifkan" : "Non Aktifkan?"
                }).then((result) => {

                    if (result.isConfirmed) {

                        $.ajax({
                            type: "PUT",
                            url: `{{ url('/pmb/data-user/status') }}`,
                            data: {
                                id: id,
                                status: status
                            },
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status == 200) {
                                    Swal.fire({
                                        title: "Sukses!",
                                        text: response.message,
                                        icon: "success"
                                    });
                                }
                            },
                            error: function(error) {
                                console.log(error);

                            }
                        });


                    }
                });
                // }

            }
        </script>
    @endpush
@endsection
