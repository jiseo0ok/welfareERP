<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bhero";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

$policy_id = $_POST['policy_id'] ?? null;

if ($policy_id === null) {
    echo "정책 ID가 제공되지 않았습니다.";
    exit;
}

$sql = "SELECT DISTINCT p.policy_id, p.policy_name, p.policy_explanation, p.policy_category,
pc.condition_category, pc.condition_detail, p.policy_benefits FROM policy AS p 
JOIN policy_condition pc ON p.policy_id = pc.policy_id WHERE p.policy_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $policy_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo "<div class=\"alert alert-warning m-3\">";
    echo "<h1>" . $row['policy_name'] . "</h1>";
    echo "</div>";
    echo "<div class=\"alert alert-success m-3\" role=\"alert\">";
    echo "<p>" . $row['policy_explanation'] . "</p>";
    echo "</div>";
    echo '<div class="col-md-12">';
    echo '<ul class="nav nav-pills nav-justified m-3" id="myTab" role="tablist">';
    echo '<li class="nav-item">';
    echo '<a class="nav-link active text-uppercase" id="support-tab" data-bs-toggle="tab" href="#support" role="tab" aria-controls="support" aria-selected="true">지원대상</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link text-uppercase" id="service-tab" data-bs-toggle="tab" href="#service" role="tab" aria-controls="service" aria-selected="false">서비스내용</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link text-uppercase" id="how-tab" data-bs-toggle="tab" href="#how" role="tab" aria-controls="how" aria-selected="false">신청방법</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link text-uppercase" id="apply-tab" data-bs-toggle="tab" href="#apply" role="tab" aria-controls="apply" aria-selected="false">신청하기</a>';
    echo '</li>';
    echo '</ul>';
    echo '<div class="tab-content m-3" id="myTabContent">';
    echo '<div class="tab-pane fade show active" id="support" role="tabpanel" aria-labelledby="support-tab">';
    echo '<div class="row">';
    echo '<div class="col-lg-12">';
    echo '<div class="card">';
    echo '<div class="card-body text-start">';
    echo '<span>이 서비스는 </span>';

// 지원대상 내용
echo '<span>(</span>';
$result->data_seek(0); // 결과 포인터를 처음으로 되돌림
while ($row = $result->fetch_assoc()) {
    if ($row['condition_category'] == '연령') {
        echo '<strong>' . $row['condition_detail'] . ' </strong>';
    }
}
echo '<span>) 대상을 위한 것입니다.</span>';

$result->data_seek(0); // 결과 포인터를 처음으로 되돌림
while ($row = $result->fetch_assoc()) {
    if ($row['condition_category'] == '지역') {
        $conditionDetail = $row['condition_detail']; // 전역 변수로 사용
        echo '<br><strong>' . $conditionDetail . '</strong> 지역에 거주하는 모든 분들이 손쉽게 참여할 수 있도록 준비되어 있습니다.</p>';
    }
}

    
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    
    echo '<div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">';
        echo '<div class="row">';
            echo '<div class="col-lg-12">';
              echo '<div class="card">';
                    echo '<div class="card-body text-start">';
                        
    
    $sql = "SELECT policy_category, policy_benefits, policy_benefits_detail FROM policy WHERE policy_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $policy_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        $benefits = $row['policy_benefits'];
        echo "<p><strong>" . $row['policy_category'] . "</strong> 에 관련된 정책 카테고리입니다.</p>";
        
        echo "<strong>" . $benefits. ": ".$row['policy_benefits_detail']."</strong>";
        if ($benefits == '지원금') {
            echo "<p style='color: green; font-weight: bold;'>
                    본 정책은 다양한 지원금을 통해 대상자의 재정적 안정을 도모합니다. 
                    지원금은 공정하고 투명한 절차를 통해 배분되며, 
                    최적의 효과를 발휘할 수 있도록 설계되어 있습니다.
                  </p>";
        }
        if ($benefits == '복지사') {
            echo "<p style='color: blue; font-style: italic;'>
                    본 정책은 복지사의 전문적인 지원을 통해 대상자의 삶의 질 향상을 목표로 합니다. 
                    복지사는 체계적인 교육과 훈련을 받았으며, 
                    최적의 효과를 발휘할 수 있도록 지속적으로 관리되고 있습니다.
                  </p>";
        }
        
    } else {
        echo "<h2>정책 정보</h2>";
        echo "<p>현재 제공 가능한 정보가 없습니다. 최신 정책 정보는 추후 업데이트될 예정이오니, 지속적인 관심과 성원을 부탁드립니다.</p>";
    }
    

    $stmt->close();
    
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    


    echo '<div class="tab-pane fade" id="how" role="tabpanel" aria-labelledby="how-tab">';
        echo '<div class="row">';
            echo '<div class="col-lg-12">';
                echo '<div class="card">';
                     echo '<div class="card-body text-start">';
                        
    // $sql = "SELECT condition_detail FROM policy_condition WHERE policy_id = ? and condition_category = '필요 문서'";
    $sql = "SELECT condition_detail FROM policy_condition WHERE policy_id = ? and condition_category = '필요 문서'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $policy_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p>이 정책은 <strong>" . $row['condition_detail'] . "</strong> 문서가 필요합니다. zip파일로 묶어 신청바랍니다.. </p>";
        
        
    } else {
        echo "<p>문서는 필요없습니다.</p>";
    }

    $stmt->close();
    $sql = "SELECT policy_start_application, policy_end_application, policy_phone FROM policy WHERE policy_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $policy_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p> " . $row['policy_start_application'] . " ~ ";
        echo  $row['policy_end_application'] . "  기간 동안 신청 가능합니다!</p>";
        echo "<p>자세한 사항은 " . $row['policy_phone'] . " 로 연락 바랍니다.</p>";
    } else {
        echo "<p>정보가 없습니다.</p>";
    }

    $stmt->close();
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
    echo '</div>';
    
    
   
    
    echo '    <div class="tab-pane fade" id="apply" role="tabpanel" aria-labelledby="apply-tab">';
    
    echo '      <div class="row text-center">';
  
    echo '        <div class="col-lg-12">';
    echo '          <div class="card">';
    echo '            <div class="card-header">';
    echo '              <h5>신청</h5>';
    echo '            </div>';
    echo '            <div class="card-body text-center">';
    echo '              <form class="validate-me" id="validate-me" action="./php/wjdcortlscjd.php" method="post"';
    echo '                enctype="multipart/form-data" novalidate="true">';
    echo '                <input type="hidden" name="policy_id" value="' . $policy_id . '">';
    echo '<input type="hidden" name="region" value="' . $conditionDetail . '">';
    echo '                <div class="form-group row">';
    echo '<div class="form-group row">';
    echo '  <label class="col-lg-2 col-form-label text-lg-end" for="name">이름</label>';
    echo '  <div class="col-lg-8">';
    echo '    <input type="text" name="name" id="name" class="form-control error" data-bouncer-message="이름을 입력해주세요." required aria-describedby="bouncer-error_name" aria-invalid="true">';
    echo '    <div class="error-message" id="bouncer-error_name">이름을 입력해주세요.</div>';
    echo '  </div>';
    echo '</div>';

   
    
    echo '                <div class="form-group row">';
    echo '                  <label class="col-lg-2 col-form-label text-lg-end" for="resident_registration_number">주민등록번호</label>';
    echo '                  <div class="col-lg-8">';
    echo '                    <input type="text" name="resident_registration_number" id="resident_registration_number"';
    echo '                      class="form-control " ';
    echo '                      aria-describedby="bouncer-error_resident_registration_number" aria-invalid="true">';
    
    echo '                  </div>';
    echo '                </div>';
    
    echo '                <div class="form-group row">';
    echo '                  <label class="col-lg-2 col-form-label text-lg-end" for="email">이메일</label>';
    echo '                  <div class="col-lg-8">';
    echo '                    <input type="email" name="email" id="email" class="form-control error"';
    echo '                      data-bouncer-message="이메일 주소 형식이 올바르지 않습니다." required="" aria-describedby="bouncer-error_email"';
    echo '                      aria-invalid="true">';
    echo '                    <div class="error-message" id="bouncer-error_email">이메일 입력 바랍니다.</div>';
    echo '                  </div>';
    echo '                </div>';
    
    echo '                <div class="form-group row">';
    echo '                  <label class="col-lg-2 col-form-label text-lg-end" for="tel">전화번호</label>';
    echo '                  <div class="col-lg-8">';
    echo '                    <input type="text" class="form-control" name="tel" id="tel" required=""';
    echo '                      aria-describedby="bouncer-error_tel" aria-invalid="true">';
  
    echo '                  </div>';
    echo '                </div>';
 
   

    
    echo '                <div class="form-group row">';
    echo '                  <label class="col-lg-2 col-form-label text-lg-end">파일업로드</label>';
    echo '                  <div class="col-lg-8">';
    echo '                    <input name="file" id="file" type="file" class="form-control" value="1">';
    echo '                  </div>';
    echo '                </div>';

    if ($benefits == '복지사') {

        echo '                <div class="form-group row">';
        echo '                  <label class="col-lg-2 col-form-label text-lg-end">사진업로드</label>';
        echo '                  <div class="col-lg-8">';
        echo '                    <input name="photo" id="photo" type="file" class="form-control" value="1">';
        echo '                  </div>';
        echo '                </div>';


    }
    
    echo '                <div class="form-group row">';
    // echo '                  <label class="col-lg-2 col-form-label text-lg-end">신청서 다운로드</label>';
    echo '                  <div class="col-lg-8">';
    $sql = "SELECT policy_document FROM policy WHERE policy_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $policy_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $policy_document = $row['policy_document'];
            echo "<a href='policy_file/$policy_document' id='download-link' download='$policy_document'>";
            echo "<button type='button' class='btn btn-primary'>신청서 다운로드</button>";
            echo "</a>";
        } else {
            echo "공식 문서가 없습니다.";
        }
        $stmt->close();
    } else {
        echo "SQL 문을 준비하는 데 실패했습니다: (" . $conn->errno . ") " . $conn->error;
    }
   
    echo '                  </div>';
    echo '                </div>';
    
    echo '                <div class="form-group row mb-0">';
    echo '                  <div class="col-lg-2 col-form-label"></div>';
    echo '                  <div class="col-lg-10 text-lg-end">';
    echo '                    <input type="submit" class="btn btn-primary" value="제출하기">';
    echo '                  </div>';
    echo '                </div>';
    echo '              </form>';
    echo '            </div>';
    echo '          </div>';
    echo '        </div>';
    echo '        <!-- [ Form Validation ] end -->';
    echo '      </div>';
    echo '    </div>';
    echo '  </div>';
    echo '  </div>';
    echo '  </div>';
     // 자바스크립트 코드 시작
     echo '<script>';
     echo 'document.getElementById("name").addEventListener("change", function (e) {';
     echo '  var target = e.target;';
     echo '  var errorDiv = document.getElementById("bouncer-error_name");';
     echo '  if (target.value.trim() !== "") {';
     echo '    errorDiv.style.display = "none";';
     echo '    target.classList.remove("error");';
     echo '    target.classList.add("success");';
     echo '  } else {';
     echo '    errorDiv.style.display = "block";';
     echo '    target.classList.remove("success");';
     echo '    target.classList.add("error");';
     echo '  }';
     echo '});';
     // 주민등록번호, 이메일, 전화번호에 대한 이벤트 리스너 추가
     
     echo 'document.getElementById("resident_registration_number").addEventListener("input", function (e) {';
     echo '  var target = e.target;';
     echo '  var regNumber = target.value.replace(/[^0-9]/g, "");';
     echo '  var formattedRegNumber = "";';
     echo '  if (regNumber.length <= 6) {';
     echo '    formattedRegNumber = regNumber;';
     echo '  } else if (regNumber.length <= 13) {';
     echo '    formattedRegNumber = regNumber.substr(0, 6) + "-" + regNumber.substr(6);';
     echo '  } else {';
     echo '    formattedRegNumber = regNumber.substr(0, 6) + "-" + regNumber.substr(6, 7);';
     echo '  }';
     echo '  target.value = formattedRegNumber;';
     echo '});';
     echo 'document.getElementById("email").addEventListener("change", function (e) {';
     echo '  var target = e.target;';
     echo '  var errorDiv = document.getElementById("bouncer-error_email");';
     echo '  if (target.value.trim() !== "" && target.checkValidity()) {';
     echo '    errorDiv.style.display = "none";';
     echo '    target.classList.remove("error");';
     echo '    target.classList.add("success");';
     echo '  } else {';
     echo '    errorDiv.style.display = "block";';
     echo '    target.classList.remove("success");';
     echo '    target.classList.add("error");';
     echo '  }';
     echo '});';
     echo 'document.addEventListener("DOMContentLoaded", function() {';
     echo '  var isValid = true;';
     echo '  var name = document.getElementById("name");';
     echo '  var residentRegistrationNumber = document.getElementById("resident_registration_number");';
     echo '  var email = document.getElementById("email");';
     echo '  var tel = document.getElementById("tel");';

     // 이름 검증
     echo '  if (!name.value.trim()) {';
     echo '    document.getElementById("bouncer-error_name").style.display = "block";';
     echo '    name.classList.add("error");';
     echo '    isValid = false;';
     echo '  } else {';
     echo '    document.getElementById("bouncer-error_name").style.display = "none";';
     echo '    name.classList.remove("error");';
     echo '  }';

     // 주민등록번호 검증
     echo '  if (!residentRegistrationNumber.value.trim() || residentRegistrationNumber.value.length !== 14) {';

        echo '    document.getElementById("bouncer-error_resident_registration_number").style.display = "block";';
   
        echo '    residentRegistrationNumber.classList.add("error");';
   
        echo '    isValid = false;';
   
        echo '  } else {';
   
        echo '    document.getElementById("bouncer-error_resident_registration_number").style.display = "none";';
   
        echo '    residentRegistrationNumber.classList.remove("error");';
   
        echo '  }';

     // 이메일 검증
     echo '  if (!email.value.trim() || !email.checkValidity()) {';
     echo '    document.getElementById("bouncer-error_email").style.display = "block";';
     echo '    email.classList.add("error");';
     echo '    isValid = false;';
     echo '  } else {';
     echo '    document.getElementById("bouncer-error_email").style.display = "none";';
     echo '    email.classList.remove("error");';
     echo '  }';

     // 전화번호 검증
     echo '  if (!tel.value.trim() || tel.value.trim().length < 12) {';
     echo '    document.getElementById("bouncer-error_tel").style.display = "block";';
     echo '    tel.classList.add("error");';
     echo '    isValid = false;';
     echo '  } else {';
     echo '    document.getElementById("bouncer-error_tel").style.display = "none";';
     echo '    tel.classList.remove("error");';
     echo '  }';

     echo '  if (!isValid) {';
     echo '    event.preventDefault();'; // 폼 제출 방지
     echo '    alert("모든 필드를 올바르게 채워주세요.");';
     echo '  }';
     echo '});';
     echo '</script>';
     
   
}
$conn->close();
?>