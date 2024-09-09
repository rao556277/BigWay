<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('slider.image_url') ? 'invalid' : '' }}">
        <label class="form-label required" for="image_url">{{ trans('cruds.slider.fields.image_url') }}</label>
        <input class="form-control" type="text" name="image_url" id="image_url" required wire:model.defer="slider.image_url">
        <div class="validation-message">
            {{ $errors->first('slider.image_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.slider.fields.image_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('slider.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.slider.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="slider.title">
        <div class="validation-message">
            {{ $errors->first('slider.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.slider.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('slider.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.slider.fields.description') }}</label>
        <input class="form-control" type="text" name="description" id="description" wire:model.defer="slider.description">
        <div class="validation-message">
            {{ $errors->first('slider.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.slider.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('slider.caption') ? 'invalid' : '' }}">
        <label class="form-label" for="caption">{{ trans('cruds.slider.fields.caption') }}</label>
        <input class="form-control" type="text" name="caption" id="caption" wire:model.defer="slider.caption">
        <div class="validation-message">
            {{ $errors->first('slider.caption') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.slider.fields.caption_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('slider.link_url') ? 'invalid' : '' }}">
        <label class="form-label required" for="link_url">{{ trans('cruds.slider.fields.link_url') }}</label>
        <input class="form-control" type="text" name="link_url" id="link_url" required wire:model.defer="slider.link_url">
        <div class="validation-message">
            {{ $errors->first('slider.link_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.slider.fields.link_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('slider.display_order') ? 'invalid' : '' }}">
        <label class="form-label" for="display_order">{{ trans('cruds.slider.fields.display_order') }}</label>
        <input class="form-control" type="number" name="display_order" id="display_order" wire:model.defer="slider.display_order" step="1">
        <div class="validation-message">
            {{ $errors->first('slider.display_order') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.slider.fields.display_order_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>