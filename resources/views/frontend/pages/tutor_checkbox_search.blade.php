
					<!--  Single Item  -->
					@foreach($tutors as $tutor)
					<div class="single-tutor card p-2">
						<div class="row">
							<div class="col-md-4  text-center">
								<?php echo "<img src='".asset($tutor->profile_pic)."' class='find-tutor-image  text-center' alt='{{$tutor->f_name}}{{$tutor->l_name}}'> ";?>
								<div class="tutor-name-content">
									<p>{{$tutor->f_name}}{{$tutor->l_name}}</p>
									<h5>{{$tutor->hourly_rate}}</h5> <br>
									<a href="{{url('tutor/profile',$tutor->userId)}}" class="btn btn-danger custom-btn">View Profile</a>
								</div>
							</div>
							<div class="col-md-8">
								
								<div class="">
									<h5 class="mt-0">{{$tutor->profile_tag}}</h5>
									{{$tutor->about_details}}
									
								</div>
								<br>
								<div class="teke-class">
									<p><b>Level</b></p>
									<?php
									// echo $tutor->userId;
										$levels = DB::table('which_subject_teaches')
										->join('levels','levels.id','=','which_subject_teaches.level')
										->where('which_subject_teaches.user_id',$tutor->userId)->get();
									?>
									@foreach($levels as $level)
									<a href="#" class="badge badge-danger">{{$level->level}}</a>
									@endforeach
								</div>
								<br>
								<div class="teke-skill">
									<p><b>Subjects</b></p>
									<?php
										$subjects = DB::table('which_subject_teaches')
										
										->where('which_subject_teaches.user_id',$tutor->userId)->get();
									?>
									@foreach($subjects as $subject)
									<?php
										$sub = explode(',',$subject->subject);
										foreach($sub as $s){
											$subjectData = DB::table('subjects')->where('id',$s)->get();
											foreach($subjectData as $mainSub){
									?>
									<a href="#" class="badge badge-danger">{{$mainSub->subject}}</a>
									<?php } }?>
									@endforeach
									
								</div>
							</div>
						</div>
					</div>
					<br>
					@endforeach
					
				</div>
				{{ $tutors->links() }}