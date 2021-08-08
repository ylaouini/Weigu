{{-- ---------------------- Image modal box ---------------------- --}}
<div id="imageModalBox" class="imageModal">
    <span class="imageModal-close">&times;</span>
    <img class="imageModal-content" id="imageModalBoxSrc">
  </div>

  {{-- ---------------------- Delete Modal ---------------------- --}}
  <div class="app-modal" data-name="delete">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="delete" data-modal='0'>
              <div class="app-modal-header">Are you sure you want to delete this?</div>
              <div class="app-modal-body">You can not undo this action</div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
                  <a href="javascript:void(0)" class="app-btn a-btn-danger delete">Delete</a>
              </div>
          </div>
      </div>
  </div>

{{-- ---------------------- block Modal ---------------------- --}}
<div class="app-modal" data-name="block">
    <div class="app-modal-container">
        <div class="app-modal-card" data-name="block" data-modal='0'>
            <div class="app-modal-header">Bloquer cet utilisateur?</div>
{{--            <div class="app-modal-body">You can not undo this action</div>--}}
            <div class="app-modal-footer">
                <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
                <a href="javascript:void(0)" class="app-btn a-btn-danger block">block</a>
            </div>
        </div>
    </div>
</div>

{{-- ---------------------- report Modal ---------------------- --}}
<div class="app-modal" data-name="report">
    <div class="app-modal-container">
        <div class="app-modal-card" data-name="report" data-modal='0'>
            <div class="app-modal-header">Signaler cet utilisateur?</div>
            {{--            <div class="app-modal-body">You can not undo this action</div>--}}
            <div class="app-modal-footer">
                <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
                <a href="javascript:void(0)" class="app-btn a-btn-danger block">Signale</a>
            </div>
        </div>
    </div>
</div>
  {{-- ---------------------- Alert Modal ---------------------- --}}
  <div class="app-modal" data-name="alert">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="alert" data-modal='0'>
              <div class="app-modal-header"></div>
              <div class="app-modal-body"></div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
              </div>
          </div>
      </div>
  </div>
  {{-- ---------------------- Settings Modal ---------------------- --}}
  <div class="app-modal" data-name="settings">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="settings" data-modal='0'>
              <form id="update-settings" action="{{ route('avatar.update') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="app-modal-header">Mettre à jour les paramètres de votre profil</div>
                  <div class="app-modal-body">
                      {{-- Udate profile avatar --}}
                      <div class="avatar av-l upload-avatar-preview"
                      style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.Auth::user()->avatar) }}');"
                      ></div>
                      <input type="text" name="name" value="{{Auth::user()->name}}">
                      <p class="divider"></p>
                      <p class="upload-avatar-details"></p>
                      <label class="app-btn a-btn-primary update">
                          Upload profile photo
                          <input class="upload-avatar" accept="image/*" name="avatar" type="file" style="display: none" />
                      </label>
                      {{-- Dark/Light Mode  --}}
                      <p class="divider"></p>
                      <p class="app-modal-header">Dark Mode <span class="
                        {{ Auth::user()->dark_mode > 0 ? 'fas' : 'far' }} fa-moon dark-mode-switch"
                         data-mode="{{ Auth::user()->dark_mode > 0 ? 1 : 0 }}"></span></p>
                      {{-- change messenger color  --}}
                      <p class="divider"></p>
                      <p class="app-modal-header">Change {{ config('chatify.name') }} Color</p>
                      <div class="update-messengerColor">
                            <span class="messengerColor-1 color-btn"></span>
                            <span class="messengerColor-2 color-btn"></span>
                            <span class="messengerColor-3 color-btn"></span>
                            <span class="messengerColor-4 color-btn"></span>
                            <span class="messengerColor-5 color-btn"></span>
                            <br/>
                            <span class="messengerColor-6 color-btn"></span>
                            <span class="messengerColor-7 color-btn"></span>
                            <span class="messengerColor-8 color-btn"></span>
                            <span class="messengerColor-9 color-btn"></span>
                            <span class="messengerColor-10 color-btn"></span>
                      </div>
                  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel">Cancel</a>
                      <input type="submit" class="app-btn a-btn-success update" value="Update" />
                  </div>
              </form>
          </div>
      </div>
  </div>
