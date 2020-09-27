<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $titleDT }}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    {{$theadDT}}
                </thead>
                <tfoot>
                    {{$tfootDT}}
                </tfoot>
                <tbody>
                    {{$tbodyDT}}
                </tbody>
            </table>
        </div>
    </div>
</div>