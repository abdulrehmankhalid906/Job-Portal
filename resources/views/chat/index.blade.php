@extends('layouts.master')
@section('content')
<div class="progress-bar">
	<span class="bar">
		<span class="progress"></span>
	</span>
</div>
<button class="btn btn-primary" type="button" disabled>
	<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
	Loading...
</button>
<main class="content">
	<div class="card">
		<div class="row g-0">
			<div class="col-12 col-lg-5 col-xl-3 border-end list-group">

				<div class="px-4 d-none d-md-block">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<p class="my-3">Select User</p>
							{{-- <input type="text" class="form-control my-3" placeholder="Search..." autocomplete="off"> --}}
						</div>
					</div>
				</div>

				@foreach ($users as $user)
					<a href="javascript::void(0);" id="{{ $user->id }}" class="list-group-item list-group-item-action border-0">
						<div class="badge bg-success float-end">5</div>
						<div class="d-flex align-items-start">
							<img src="{{ asset('admin/assets/img/avatars/avatar-3.jpg') }}" class="rounded-circle me-1" alt="Vanessa Tucker" width="40" height="40">
							<div class="flex-grow-1 ms-3">
								{{ $user->name }}
								<div class="small"><span class="fas fa-circle chat-online"></span>Typing... {{ $user->id }}</div>
							</div>
						</div>
					</a>
				@endforeach
				<hr class="d-block d-lg-none mt-1 mb-0" />
			</div>
			

			<div class="col-12 col-lg-7 col-xl-9" id="chat_layout">
				<div class="py-2 px-4 border-bottom d-none d-lg-block">
					<div class="d-flex align-items-center py-1">
						<div class="position-relative">
							<img src="{{ asset('admin/assets/img/avatars/avatar-3.jpg') }}" class="rounded-circle me-1" alt="Sharon Lessman" width="40" height="40">
						</div>
						<div class="flex-grow-1 ps-3">
							<strong>Sharon Lessman</strong>
							<div class="text-muted small"><em>Typing...</em></div>
						</div>
						<div>
							<button class="btn btn-light border btn-lg px-3"><i class="feather-lg" data-feather="more-horizontal"></i></button>
						</div>
					</div>
				</div>
				<div class="position-relative">
					<div class="chat-messages p-4">
						<div class="chat-message-right pb-4">
							<div>
								<img src="{{ asset('admin/assets/img/avatars/avatar-3.jpg') }}" class="rounded-circle me-1" alt="Chris Wood" width="40" height="40">
								<div class="text-muted small text-nowrap mt-2">2:33 am</div>
							</div>
							<div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
								<div class="font-weight-bold mb-1">You</div>
								Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
							</div>
						</div>

						<div class="chat-message-left pb-4">
							<div>
								<img src="{{ asset('admin/assets/img/avatars/avatar-3.jpg') }}" class="rounded-circle me-1" alt="Sharon Lessman" width="40" height="40">
								<div class="text-muted small text-nowrap mt-2">2:34 am</div>
							</div>
							<div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
								<div class="font-weight-bold mb-1">Sharon Lessman</div>
								Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
							</div>
						</div>
					</div>
				</div>
				<div class="flex-grow-0 py-3 px-4 border-top">
					<form action="{{ route('send.message') }}" method="POST" autocomplete="off">
						@csrf
						<input type="text" name="receiver_id" value="1">
						<div class="input-group">
							<input type="text" class="form-control" name="message" placeholder="Type your message">
							<button class="btn btn-primary">Send</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('.list-group-item').on('click', function(event) {
			event.preventDefault();
			var user_id = $(this).attr('id');

			$.ajax({
				url: "{{ route('get.messages') }}",
				type: "GET",
				dataType: 'JSON',
				data: {
					user_id: user_id
				},
				cache: false,
				beforeSend: function() {
					$('#chat_layout').html("<p>Loading messages...</p>");
				},
				success: function(response) {
					if (response.status === true)
					{
						let receiverName = response.messages.length > 0 ? response.messages[0].receiver.name : 'User';
						
						let html = `
							<div class="py-2 px-4 border-bottom d-none d-lg-block">
								<div class="d-flex align-items-center py-1">
									<div class="position-relative">
										<img src="{{ asset('admin/assets/img/avatars/avatar-3.jpg') }}" class="rounded-circle me-1" alt="Receiver Avatar" width="40" height="40">
									</div>
									<div class="flex-grow-1 ps-3">
										<strong>${receiverName}</strong>
										<div class="text-muted small"><em>Typing...</em></div>
									</div>
									<div>
										<button class="btn btn-light border btn-lg px-3"><i class="feather-lg" data-feather="more-horizontal"></i></button>
									</div>
								</div>
							</div>
							<div class="position-relative">
								<div class="chat-messages p-4">`;
									response.messages.forEach(function(message) {
										let alignment = message.sender_id === {{ auth()->id() }} ? 'right' : 'left'; 
										let marginClass = alignment === 'right' ? 'me-3' : 'ms-3';
										let userName = alignment === 'right' ? 'You' : message.receiver.name || 'User';

										html += `
											<div class="chat-message-${alignment} pb-4">
												<div>
													<img src="{{ asset('admin/assets/img/avatars/avatar-3.jpg') }}" class="rounded-circle me-1" alt="${userName}" width="40" height="40">
													<div class="text-muted small text-nowrap mt-2">${new Date(message.created_at).toLocaleString()}</div>
												</div>
												<div class="flex-shrink-1 bg-light rounded py-2 px-3 ${marginClass}">
													<div class="font-weight-bold mb-1">${userName}</div>
													${message.message || ''}
												</div>
											</div>`;
									});

						html += `</div></div>`;
						$('#chat_layout').html(html);
					} else {
						$('#chat_layout').html("<p>No messages found.</p>");
					}
				},
				error: function() {
					$('#chat_layout').html("<p>Error loading messages. Please try again.</p>");
				}
			});
		});
	});
</script>
