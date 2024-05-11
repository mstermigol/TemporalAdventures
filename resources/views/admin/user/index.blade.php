<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
  <div class="container">
    <div class="row">
      <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.user.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>@lang('admin.user.table_name')</th>
            <th>@lang('admin.user.table_user_role')</th>
            <th>@lang('admin.user.table_actions')</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($viewData['users'] as $user)
            <tr>
              <td>{{ $user->getName() }}</td>
              <td>{{ $user->getIsStaff() ? trans('admin.user.admin') : trans('admin.user.regular') }}</td>
              <td>
                <div class="d-flex justify-content-start">
                  <a href="{{ route('admin.user.show', ['id' => $user->getId()]) }}" class="btn btn-dark me-1"><i
                      class="fas fa-eye"></i></a>
                  <a href="{{ route('admin.user.edit', ['id' => $user->getId()]) }}" class="btn btn-primary me-1"><i
                      class="fas fa-pencil-alt"></i></a>
                  <form action="{{ route('admin.user.delete', $user->getId()) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger me-1"
                      onclick="return confirm('{{ $viewData['delete'] }}')"><i class="fas fa-trash-alt"></i></button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <div class="alert alert-danger" role="alert">
              @lang('admin.user.empty')
            </div>
          @endforelse
        </tbody>
      </table>
      {{ $viewData['users']->links() }}
    </div>
  </div>
@endsection
