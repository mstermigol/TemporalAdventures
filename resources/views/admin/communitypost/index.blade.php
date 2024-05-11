<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.communitypost.create') }}" class="btn btn-success" title="@lang('admin.community.create_post')">
      <i class="fas fa-plus"></i> @lang('admin.community.create_post')
    </a>
  </div>
  <div class="container">
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th>User</th>
            <th>Title</th>
            <th>Posted On</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($viewData['communityPosts'] as $communityPost)
            <tr>
              <td>{{ $communityPost->getUser()->getName() }}</td>
              <td>{{ $communityPost->getTitle() }}</td>
              <td>{{ $communityPost->getCreatedAt() }}</td>
              <td>
                <div class="d-flex">
                  <form method="GET" action="{{ route('admin.communitypost.show', ['id' => $communityPost->getId()]) }}">
                    @csrf
                    <button type="submit" class="btn btn-dark ms-2" title="View">
                      <i class="bi bi-eye-fill"></i>
                    </button>
                  </form>
                  @if (Auth::check() && Auth::getUser()->getId() === $communityPost->getUser()->getId())
                    <form method="GET" action="{{ route('admin.communitypost.edit', $communityPost->getId()) }}">
                      @csrf
                      <button type="submit" class="btn btn-primary ms-2" title="Edit">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                    </form>
                  @endif
                  <form method="POST" action="{{ route('admin.communitypost.delete', $communityPost->getId()) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ms-2" title="Delete"
                      onclick="return confirm('{{ $viewData['delete'] }}')">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $viewData['communityPosts']->links() }}
    </div>
  </div>
@endsection
