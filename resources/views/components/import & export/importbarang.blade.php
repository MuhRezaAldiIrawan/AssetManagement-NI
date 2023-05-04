    <!-- Modal Choose Export & Import-->
    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Choose Your Option</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-around ">
                    <button class="btn btn-success" data-bs-target="#modalToggle2" data-bs-toggle="modal"
                        data-bs-dismiss="modal">
                        Import Data Excel Barang
                    </button>
                    <button class="btn btn-success" data-bs-target="#modalToggle3" data-bs-toggle="modal"
                        data-bs-dismiss="modal">
                        Export Data Excel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Import-->
    <div class="modal fade" id="modalToggle2" aria-hidden="true" aria-labelledby="modalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel2">Upload File Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Silahkan Upload File Excel Anda Sesuai dengan Format barang</p>
                    <form method="POST" action="/listbarang/import_excel" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="file">Upload File</label>
                            <div class="input-group input-group-merge">
                                <span id="file" class="input-group-text"><i class="bx bxs-file"></i></span>
                                <input type="file" id="file" name="file" class="form-control" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">
                            <span class="tf-icons bx bx-upload"></span>&nbsp; Upload
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
