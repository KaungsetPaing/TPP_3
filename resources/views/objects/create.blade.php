
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div>
            <form action="{{ route('objects.store')}}" method="POST">
                @csrf
                    <div>
                        <label for="">Name</label>
                        <input type="text" name="name" id="">
                    </div>
                    <div class="col-4">
                        <label for="">Price</label>
                        <input type="text" name="data['pirce']" value="">
                    </div>
                    <div class="col-4">
                        <label for="">Color</label>
                        <input type="text" name="data['color']" value="">
                    </div>

                <button type="submit">Create</button>
            </form>
        </div>

    </div>
