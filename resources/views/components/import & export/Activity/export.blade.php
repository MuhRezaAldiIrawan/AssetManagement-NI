    <!-- Modal Choose Export & Import-->
    <div class="modal fade" id="modalToggle3" aria-labelledby="modalToggleLabel3" tabindex="-1" style="display: none"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel3">Choose Your Option</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-around ">
                    <a href="/toll/export_excel" target="_blank">
                        <button class="btn btn-success">
                            Export Data Excel All Data
                        </button>
                    </a>
                    <button class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#modalCenter1">Export Data Excel From Date
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Export-->
    <div class="modal fade" id="modalCenter1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Export Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/toll/exportdate" method="get">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="from_date" class="form-label">Start Date</label>
                            <input type="date" id="from_date" name="from_date" class="form-control"
                                placeholder="Tanggal Mulai" />
                        </div>
                        <div class="col mb-0">
                            <label for="to_date" class="form-label">End Date</label>
                            <input type="date" id="to_date" name="to_date" class="form-control"
                                placeholder="Tanggal Berakhir" />
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Export to Excel</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
