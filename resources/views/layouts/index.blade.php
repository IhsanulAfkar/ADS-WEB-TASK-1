<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Yajra Datatables</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    @include('sweetalert::alert')
    <div class="container py-5">
        <div class="row">
            <h2 class="fs-5 fw-bold text-center mb-4">
                Reports Datatables
            </h2>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-striped table-bordered" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ticket No</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Media</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('report.submit') }}">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <div class="mb-3">
                            <label for="ticket_id" class="col-form-label">Ticket_id</label>
                            <input type="text" name="ticket_id2" class="form-control" id="ticket_id2" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="col-form-label">Title</label>
                            <input class="form-control" name="title" id="title" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Description</label>
                            <input name="description" class="form-control" id="description" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="current" class="col-form-label">Current Status</label>
                            <input class="form-control" id="current" disabled />
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status1"
                                    value="Pending">
                                <label class="form-check-label" for="status1">
                                    Pending
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status2"
                                    value="Proses Administratif">
                                <label class="form-check-label" for="status2">
                                    Proses Administratif
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status3"
                                    value="Proses Penanganan">
                                <label class="form-check-label" for="status3">
                                    Proses Penanganan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status4"
                                    value="Selesai Ditangani">
                                <label class="form-check-label" for="status4">
                                    Selesai Ditangani
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status5"
                                    value="Laporan Ditolak">
                                <label class="form-check-label" for="status5">
                                    Laporan Ditolak
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="category2" class="col-form-label">Report Category</label>
                            <input class="form-control" id="category2" name="category2" disabled />
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="category1"
                                    value="infrastruktur" checked>
                                <label class="form-check-label" for="category1">
                                    Infrastruktur
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="category2"
                                    value="lingkungan">
                                <label class="form-check-label" for="category2">
                                    Lingkungan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="category3"
                                    value="layanan-public">
                                <label class="form-check-label" for="category3">
                                    Layanan Publik
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="category4"
                                    value="keamanan">
                                <label class="form-check-label" for="category4">
                                    Keamanan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="category5"
                                    value="kesehatan">
                                <label class="form-check-label" for="category5">
                                    Kesehatan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="category6"
                                    value="lain-lain">
                                <label class="form-check-label" for="category6">
                                    Lain-lain
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="comments" class="col-form-label">Report Comments</label>
                            <input class="form-control" id="comments" name="comments" />
                        </div>

                    </div>
                    <input type="hidden" name="ticket_id" id="ticket_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        const exampleModal = document.getElementById('exampleModal')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const json_report = button.getAttribute('data-bs-whatever')
                const report = JSON.parse(json_report)

                // Update the modal's content.
                const modalTitle = document.getElementById('exampleModalLabel')
                const ticket_id = document.getElementById('ticket_id')
                const ticket_id2 = document.getElementById('ticket_id2')
                const title = document.getElementById('title')
                const description = document.getElementById('description')
                const current = document.getElementById('current')
                const category2 = document.getElementById('category2')
                modalTitle.textContent = `Report from ${report.name}`
                ticket_id.value = report.ticket_id
                ticket_id2.value = report.ticket_id
                title.value = report.title
                description.value = report.description
                current.value = report.status
                // category.value = report.category_id
                category2.value = report.category_name
                // status.value = report.status
                switch (report.status) {
                    case "Pending":
                        document.getElementById('status1').checked = true
                        break;
                    case "Proses Administratif":
                        document.getElementById('status2').checked = true
                        break;
                    case "Proses Penanganan":
                        document.getElementById('status3').checked = true
                        break;
                    case "Selesai Ditangani":
                        document.getElementById('status4').checked = true
                        break;
                    case "Laporan Ditolak":
                        document.getElementById('status5').checked = true
                        break;
                }
            })
        }
        $(document).ready(function() {
            $('#userTable').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                ajax: `{{ url()->current() }}`,
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        width: '5%'
                    },
                    {
                        data: 'ticket_id',
                        name: 'ticket_id',
                        orderable: true,
                        searchable: true,
                        width: '15%'
                    },
                    {
                        data: 'title',
                        name: 'title',
                        orderable: true,
                        searchable: true,
                        width: '20%'
                    },
                    {
                        data: 'description',
                        name: 'description',
                        orderable: true,
                        searchable: true,
                        width: '20%'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        orderable: true,
                        searchable: true,
                        width: '20%'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        searchable: true,
                        width: '20%'
                    },
                    {
                        data: 'media',
                        name: 'media',
                        orderable: true,
                        searchable: true,
                        width: '20%'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '10%'
                    }
                ]
            });
        });
    </script>
</body>

</html>
