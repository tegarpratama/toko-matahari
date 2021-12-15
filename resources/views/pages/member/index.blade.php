@extends('layouts.back')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="row">
                    <div class="col">
                        <h3>Data Member</h3>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col d-flex flex-row-reverse">
                        <form action="{{ route('admin.member.index') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-sm" placeholder="Cari member" name="member" aria-describedby="button-addon2" value="{{ old('member') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-dark" type="submit" id="button-addon2">
                                        <i class="ti-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table text-center table-bordered mb-4">
                                <thead>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th class="text-center">Telp</th>
                                </thead>
                                <tbody>
                                    @forelse ($user as $s)
                                        <tr>
                                            <td>{{ ($user->currentPage() - 1) * $user->perPage() + $loop->index + 1 }}</td>
                                            <td>{{ $s->nama }}</td>
                                            <td>{{ $s->email }}</td>
                                            <td class="text-center">{{ $s->no_telp }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data user Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{ $user->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
