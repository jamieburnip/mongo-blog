<form class="form-horizontal" role="form" method="{{ $method ?? 'POST' }}" action="{{ $action ?? '' }}">
    {{ csrf_field() }}

    @if(null !== $post->id)
        <input type="hidden" name="id" value="{{ $post->id }}">
    @endif

    <div class="field">
        <label for="title" class="label">Post Title</label>
        <p class="control">
            <input id="title" name="title" type="text" class="input"
                   value="{{ old('title', $post->title) }}" autocomplete="false" autofocus>
        </p>

        @if ($errors->has('title'))
            <p class="help is-danger">
                {{ $errors->first('title') }}
            </p>
        @endif
    </div>

    <hr>

    <div class="field">
        <label for="body" class="label">Post</label>
        <p class="control">
            <textarea id="body" name="body" class="textarea" autocomplete="false">
                {{ old('body', $post->body) }}
            </textarea>
        </p>

        @if ($errors->has('body'))
            <p class="help is-danger">
                {{ $errors->first('body') }}
            </p>
        @endif
    </div>

    <hr>

    <div class="field is-grouped">
        @if($post->published_at === null)
            <p class="control">
                <span class="select">
                    <select name="publish">
                        <option value="0">Draft</option>
                        <option value="1">Publish</option>
                    </select>
                </span>
            </p>
        @endif
        <p class="control">
            <button type="submit" class="button is-primary">Save</button>
        </p>
    </div>
</form>