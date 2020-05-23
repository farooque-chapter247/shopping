
			@if(\Session::has('status') && \Session::has('message'))

				@if(!empty(\Session::get('status')))
			        
			        @component('admin.components.alert')

						@slot('class','info')
						@slot('icon_type','fa-check')

			            {{Session::get('message')}}
			        
			        @endcomponent

			    @else

			    	@component('admin.components.alert')

			            @slot('class','warning')
						@slot('icon_type','fa-times')
			            {{\Session::get('message')}}
			        
			        @endcomponent

			    @endif

			@elseif(!\Session::has('status') && \Session::has('message'))

			    @component('admin.components.alert')

			        @slot('class','info')
					@slot('icon_type','fa-info')
			        {{\Session::get('message')}}
			    
			    @endcomponent

			@endif
