      <!-- Top Modal -->
      <div class="modal fade" id="@stack('modal-id')" tabindex="-1" role="dialog" aria-labelledby="modal-top" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">@stack('modal-title')</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        @yield('modal-content')
                    </div>
                </div>
                <div class="modal-footer p-0">
                    @stack('modal-footer')
                </div>
            </div>
        </div>
    </div>
        <!-- END Top Modal -->