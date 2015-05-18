<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $resume->ntv->full_name() . " - " . $resume->tieude_cv }}</title>
	{{ HTML::style('assets/css/print-cv.css') }}
</head>
<body><!-- onload="window.print()">  -->
<div style="position: relative">
	<div id="cvo-document" class="cvo-document">
		<div class="cvo-page" id="cvo-page-1">
			<div class="cvo-subpage" id="cvo-subpage-1">
				<div class="block profile">
					<table class="profile-table">
						<tbody>
							<tr>
								<td>
									<span id="fullname">{{ $resume->ntv->full_name() }}</span>
								</td>
							</tr>
							<tr>
								<td>
									<span id="title">{{ $resume->cvganday }}</span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="profile-label">Ngày sinh: </span>
									<span class="profile-field" id="dateofbirth">{{ $resume->ntv->date_of_birth }}</span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="profile-label">Email: </span>
									<span class="profile-field" id="email">{{ $resume->ntv->email }}</span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="profile-label">Điện thoại: </span>
									<span class="profile-field" id="phone">{{ $resume->ntv->phone_number }}</span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="profile-label">Địa chỉ: </span>
									<span class="profile-field" id="address">{{ $resume->ntv->address }}</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="block objective">
					<h3 class="block-title">Mục tiêu nghề nghiệp</h3>
					<div class="block-body">
						<span id="objective"><p>{{ $resume->dinhhuongnn }}</p></span>
					</div>
				</div>
				<div class="block education">
					<h3 class="block-title">Trình độ và học vấn</h3>
					<div class="education-table">
						@foreach ($resume->certificate as $cert)
						<div class="row">
							<div class="time">
								<span class="start">{{ $cert->study_from }}</span> -
								<span class="end">{{ $cert->study_to }}</span>
							</div>
							<div class="school">
								<span class="school-name">{{ $cert->school }}</span>
								<span class="school-major">{{ $bang_cap[$cert->level] }} in {{ $cert->subject }}</span>
							</div>
							<div style="clear: both"></div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="block experience">
					<h3 class="block-title">Kinh nghiệm</h3>
					<div class="experience-table">
						@foreach ($resume->experience as $exp)
						<div class="row">
							<div class="time">
								<span class="start">{{ $exp->from_date }}</span> - 
								<span class="end">{{ $exp->to_date }}</span>
							</div>
							<div class="company">
								<span class="company-name">{{ $exp->company_name }}</span>
								<span class="position">{{ $exp->position }}</span>
								<span class="exp">{{ nl2br($exp->job_detail) }}</span>
							</div>
							<div style="clear: both"></div>
						</div>
						@endforeach
					</div>
				</div>

				<div class="block skill">
					<h3 class="block-title">Skills</h3>
					<div class="skill-table">
						<div class="row">
							{{ nl2br($resume->kynang) }}
						</div>
						
					</div>
				</div>

				<div class="block activity">
					<h3 class="block-title">Social Activities</h3>
					<div class="activity-table">
						<div class="row">
							<div class="time">
								<span class="start">Jan 2012</span> -
								<span class="end">Dec 2013</span>
							</div>
							<div class="organization">
								<span class="organization-name">Marketing Club</span>
								<span class="position">President</span>
								<span class="exp"><p>- Make plan of activities in a year for the club.</p><p>- Execute all the activities by giving the directions &amp; control the processing.<br>- Contact, negotiate, cooperate with sponsors and other clubs in National Economics University.<br></p></span>
							</div>
							<div style="clear: both"></div>
						</div>
					</div>
				</div>

				<div class="block awards">
					<h3 class="block-title">Certificate and awards</h3>
					<div class="awards-table">
						<div class="row">
							<div class="time">
									<span class="award_time">July 2014</span>
							</div>
							<div class="details">
								<span class="title">Bachelor in Marketing at National Economics University</span>
							</div>
							<div style="clear: both"></div>
						</div>
						<div class="row">
							<div class="time">
								<span class="award_time">Jan 2014</span>
							</div>
							<div class="details">
								<span class="title">Toeic 650 by IIG Viet Nam</span>
							</div>
							<div style="clear: both"></div>
						</div>
						<div class="row">
							<div class="time">
								<span class="award_time">July 22, 2012</span>
							</div>
							<div class="details">
								<span class="title">Third Pride in "Star up with Kawaii" competition.</span>
							</div>
							<div style="clear: both"></div>
						</div>
					</div>
				</div>
				<div class="block reference">
					<h3 class="block-title">References</h3>
					<div class="reference-table">
						<div class="row">
							<div>
								<span class="title">Mr ABC</span>
							</div>
							<div>
								<span class="content">
									<p>Marketing Director<br>FPT Trade Co, ltd<br>Tel: xxxx-xxx-xxx</p>						
								</span>
							</div>
							<div style="clear: both"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>