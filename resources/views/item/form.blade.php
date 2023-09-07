<div class="card-body">
    <div class="form-group">
        <label>Nama Alat</label>
        <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" placeholder="Nama Alat" value="{{ old('title', $item->title) }}">
        @error('title')
            <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <textarea name="details" class="form-control @error('details') is-invalid @enderror"> {{ old('details', $item->details) }}</textarea>
        @error('details')
            <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label>Diurus Oleh</label>
        <select class="form-control  @error('user_id') is-invalid @enderror" name="user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" @if (old('user_id', $item->user_id) == $user->id) selected @endif>
                    {{ $user->name }}</option>
            @endforeach
        </select>
        @error('user_id')
            <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <div class="form-group">
        <label>Lampiran</label>
        <input id="image" name="image" class="form-control @error('image') is-invalid @enderror" data-input="false" type="file" />
        @error('image')
            <span class="error invalid-feedback">{{$message}}</span>
        @enderror
    </div>
    @if($item->image)
    <div class="form-group">
        <img src="{{ asset('uploads/'.$item->image) }}" style="height: 50px;width:100px;">
    </div>
    @endif
    </div>
</div>
