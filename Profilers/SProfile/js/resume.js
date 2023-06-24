const inputfields = document.querySelector('.input-fields')
const output = document.querySelector('.output')

let inputShow = true

async function TextEditor(element) {
    const newEditor = await ClassicEditor
        .create(element, {
            toolbar: ['heading', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
        })
    return newEditor

}

let workExpdetails;
TextEditor(inputfields["workexp"]).then(nEditor => {
    workExpdetails = nEditor
})
let Academic;
TextEditor(inputfields["academics"]).then(nEditor => {
    Academic = nEditor
})

function toggle() {
    if (inputShow) {
        inputfields.style.display = "none"
        inputShow = false
        var index = 0;
        // for(var i=0; i<$("input").length; i++){
        //     var name = $("input")[index];

        //     if(name.value===" "){
        //         var thisClass = name.attributes[3].value;
        //         $(thisClass).hide();
        //     }
        //     index++;

        // }

            output.innerHTML = `
            <div class="personal">
            <img src="https://app.joinsuperset.com/tnpsuite-core/profile_photo/ab0cc5a5-196a-4889-aae1-f8549c337011"
                alt="profile img">
            <div class="personal-details">
                <label for="name"></label>
                <h4 class="name">${inputfields["name"].value}</h4>
                <div>
                    <label for="course">Course :</label>
                    <h4 class="course">${inputfields["course"].value}</h4>
                </div>
                <div>
                    <label for="email">Email :</label>
                    <h4 class="email">${inputfields["email"].value}</h4>
                </div>
                <div>
                    <label for="mobile">Mobile :</label>
                    <h4 class="mobile">${inputfields["mobile"].value}</h4>
                </div>
                <div>
                    <label for="cgpa">CGPA :</label>
                    <h4 class="cgpa">${inputfields["cgpa"].value}</h1>
                </div>
            </div>
            <img class="logo" src="acpcelogo.png" alt="">
        
        </div>
    
        <div>
            <table width="931px">
                <tr class="heading" style="text-align: left;">
                    <th colspan="6">ACADEMIC DETAILS</th>
                </tr>
                <tr class="details">
                    <th>COURSE</th>
                    <th>SPECIALIZATION</th>
                    <th>INSTITUTE/COLLEGE</th>
                    <th>BOARD/UNIVERSITY</th>
                    <th>SCORE</th>
                    <th>YEAR</th>
                </tr>
                <tr>
                    <td>${inputfields["course"].value}</td>
                    <td>${inputfields["specialization"].value}</td>
                    <td>${inputfields["college"].value}</td>
                    <td>${inputfields["board"].value}</td>
                    <td>${inputfields["score"].value}</td>
                    <td>${inputfields["year"].value}</td>
                </tr>
                <tr>
                    <td>${inputfields["course10"].value}</td>
                    <td>${inputfields["specialization10"].value}</td>
                    <td>${inputfields["college10"].value}</td>
                    <td>${inputfields["board10"].value}</td>
                    <td>${inputfields["score10"].value}</td>
                    <td>${inputfields["year10"].value}</td>
            </table>
        
            <table class="subHeading">
                <tr>
                    <th class="subject">Subjects / Electives</th>
                    <th width="931px" class="subHeading">${inputfields["subjects"].value}</th>
                </tr>
                <tr>
                    <th class="subject">Technical Proficiency</th>
                    <th width="931px" class="subHeading">${inputfields["technical"].value}</th>
        
                </tr>
            </table>
        
            <table>
                <tr>
                    <th class="heading">SUMMER INTERNSHIP / WORK EXPERIENCE</th>
                </tr>
                <tr>
                    <th width="931px" class="subHeading">${inputfields["internship"].value}</th>
                </tr>
            </table>
            <table>
                <tr>
                    <th class="heading">PROJECTS</th>
                </tr>
                <tr>
                    <th class="subHeading">${inputfields["projects"].value}</th>
                </tr>
            </table>
            <table>
                <tr>
                    <th class="heading">POSITION OF RESPONSIBILTY</th>
                </tr>
                <tr>
                    <th class="subHeading">${inputfields["position"].value}</th>
                </tr>
            </table>
            <table>
            <tr>
                <th class="heading">EXTRA CURRICULAR ACTIVITIES</th>
            </tr>
            <tr>
                <th class="subHeading">${inputfields["activity"].value}</th>
            </tr>
        </table>
        <table>
                <tr>
                    <th class="heading">AWARDS AND RECOGNITION</th>
                </tr>
                <tr>
                    <th class="subHeading">${inputfields["awards"].value}</th>
                </tr>
            </table>
            <table>
                <tr>
                    <th class="heading" colspan="2">CERTIFICATIONS</th>
                </tr>
                <tr class="details">
                    <th class="subHeading"> <label>CERTIFICATE - </label>${inputfields["certificate"].value}</th>
                    <th class="subHeading"> <label>CERTIFYING AUTHORITY - </label>${inputfields["certifyingAuthority"].value}</th>
                </tr>
            </table>
            <table>
            <tr>
                <th class="heading">COMPETITIONS</th>
            </tr>
            <tr>
                <th class="subHeading">${inputfields["competition"].value}</th>
            </tr>
        </table>
        <table>
            <tr>
                <th class="heading">CONFERENCES AND WORKSHOPS</th>
            </tr>
            <tr>
                <th class="subHeading">${inputfields["workshop"].value}</th>
            </tr>
        </table>
        <table>
                <tr>
                    <th class="heading" colspan="3">TEST SCORES</th>
                </tr>
                <tr class="details">
                    <th> <label>TEST NAME - </label>${inputfields["test"].value}</th>
                    <th> <label>DATE OF EXAM - </label>${inputfields["dateOfTest"].value}</th>
                    <th> <label>SCORE - </label>${inputfields["testScore"].value}</th>
                </tr>
            </table>
            <table>
            <tr>
                <th class="heading">PATENTS</th>
            </tr>
            <tr>
                <th class="subHeading">${inputfields["patent"].value}</th>
            </tr>
        </table>
        <table>
                <tr>
                    <th class="heading">PUBLICATIONS</th>
                </tr>
                <tr>
                    <th class="subHeading">${inputfields["publicaiton"].value}</th>
                </tr>
            </table>
            <table>
            <tr>
                <th class="heading">SCHOLARSHIPS</th>
            </tr>
            <tr>
                <th class="subHeading">${inputfields["scholarship"].value}</th>
            </tr>
        </table>
        <table>
                <tr>
                    <th class="heading">VOLUNTEER EXPERIENCE</th>
                </tr>
                <tr>
                    <th class="subHeading">${inputfields["volunteer"].value}</th>
                </tr>
            </table>
            <table>
            <tr>
                <th class="heading">LANGUAGES KNOWN</th>
            </tr>
            <tr>
                <th class="subHeading">${inputfields["language"].value}</th>
            </tr>
        </table>
        </div>
        <div class="btn">
            <button onclick="print()">Print Resume</button>
        </div>

         `
        
        // for (var i = 0; i < $("input").length; i++) {
        //     var name = $("input")[index];

        //     if (name.value === " ") {
        //         var thisClass = name.attributes[3].value;
        //         $(thisClass).hide();
        //     }
        //     index++;

        // }
    } else {
        inputfields.style.display = "block"
        inputShow = true
        output.innerHTML = ""
    }

}  