<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Information Extractor</title>
    <!-- Use Tailwind CSS for a modern and responsive design -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        .w-8 {
    width: 8rem !important;
}
.h-8 {
    height: 6rem !important;
}
    </style>
    <!-- Include the pdf.js library -->
    <script src="https://mozilla.github.io/pdf.js/build/pdf.mjs" type="module"></script>
    <script type="module">
        // Set up the worker for pdf.js
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.mjs';
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

 <div id="job-loader" style="
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: 10;
    display: none;justify-content:center;
    background-color:#00000026;
  ">
    <div class="flex justify-center items-center">
    <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
    </svg>
</div>

  </div>

    <!-- Main container for the application -->
    <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-2xl">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Applicant Naukri Bulk</h1>
        <p class="text-center text-gray-500 mb-8">Upload a PDF file</p>

        <!-- File upload section -->
        <div class="flex items-center justify-center w-full mb-6">
            <label for="file-upload" class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200 ease-in-out">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-4-4v0a4 4 0 014-4h4.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.586a1 1 0 011 1v6a1 1 0 01-1 1H7a1 1 0 01-1-1z"></path>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-400">Supported formats: .pdf</p>
                </div>
                <input id="file-upload" type="file" class="hidden" accept=".pdf" multiple name="resume[]" id="resume"/>
            </label>
        </div>
        
        <!-- Display file name and processing status -->
        <div id="file-info" class="text-sm text-center text-gray-600 mb-4 hidden">
            <span id="file-name" class="font-medium"></span> - <span id="file-status"></span>
        </div>

        <!-- Section to display extracted information -->
        <div id="results-container" class="mt-8 hidden">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Extracted Information</h2>
            <div id="results-list" class="space-y-6"></div>
        </div>
        
        <!-- Error/Status message box -->
        <div id="message-box" class="mt-6 p-4 rounded-lg text-center font-medium hidden"></div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script type="module">
        import * as pdfjsLib from 'https://mozilla.github.io/pdf.js/build/pdf.mjs';

        // Set up the worker for pdf.js again to ensure it's available in the module scope
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.mjs';

        document.addEventListener('DOMContentLoaded', () => {
            const fileInput = document.getElementById('file-upload');
            const fileInfo = document.getElementById('file-info');
            const fileNameSpan = document.getElementById('file-name');
            const fileStatusSpan = document.getElementById('file-status');
            const resultsContainer = document.getElementById('results-container');
            const resultsList = document.getElementById('results-list');
            const messageBox = document.getElementById('message-box');
            
            // Function to display messages in a styled box
            function showMessage(message, type = 'info') {
                messageBox.textContent = message;
                messageBox.classList.remove('hidden', 'bg-red-100', 'text-red-700', 'bg-green-100', 'text-green-700');
                if (type === 'error') {
                    messageBox.classList.add('bg-red-100', 'text-red-700');
                } else if (type === 'success') {
                    messageBox.classList.add('bg-green-100', 'text-green-700');
                } else {
                    messageBox.classList.add('bg-blue-100', 'text-blue-700');
                }
            }

            // Function to hide all result and message containers
            function resetUI() {
                fileInfo.classList.add('hidden');
                resultsContainer.classList.add('hidden');
                messageBox.classList.add('hidden');
                resultsList.innerHTML = '';
            }

            // Event listener for file selection
            fileInput.addEventListener('change', async (event) => {
                resetUI();
                const files = event.target.files;

                if (files.length === 0) {
                    showMessage("No file selected.", 'error');
                    return;
                }

 const invalidFiles = Array.from(files).filter(file => !file.name.startsWith("Naukri_"));
    if (invalidFiles.length > 0) {
        showMessage("All files must start with 'Naukri_'. Please correct the filenames.",'error');
        fileInput.value = ""; // Clear file input
        return; // Stop further processing
    }
                
                const validFiles = Array.from(files).filter(file => file.type === "application/pdf");
                if (validFiles.length === 0) {
                    showMessage("Invalid file type. Please upload one or more PDF files.", 'error');
                    return;
                }
                
                document.getElementById('job-loader').style.display='flex';
                fileStatusSpan.textContent = `Processing ${validFiles.length} files...`;
                fileInfo.classList.remove('hidden');

                const extractedDataArray = [];

                for (const file of validFiles) {
                    try {
                        const arrayBuffer = await file.arrayBuffer();
                        const loadingTask = pdfjsLib.getDocument({ data: arrayBuffer });
                        const pdf = await loadingTask.promise;
                        
                        let textContent = '';
                        for (let i = 1; i <= pdf.numPages; i++) {
                            const page = await pdf.getPage(i);
                            const text = await page.getTextContent();
                            const sortedItems = text.items.sort((a, b) => b.transform[5] - a.transform[5]);
                            textContent += sortedItems.map(item => item.str).join(' ');
                            page.cleanup();
                        }
                        
                        const extractedData = extractInfo(file.name, textContent);
                        extractedDataArray.push(extractedData);
                        
                    } catch (error) {
                        console.error(`Error processing file ${file.name}:`, error);
                        extractedDataArray.push({
                            name: "Error",
                            email: "Error",
                            phone: "Error",
                            experience: "Error",
                            technicalSkills: ["Error"],
                            education: ["Error"]
                        });
                    }
                }

  const missingRequiredApplicants = extractedDataArray.filter(item =>
    !item ||
    !item.email ||
    item.email === "Not Found" ||
    item.email === "Error" ||
    !item.phone ||
    item.phone === "Not Found" ||
    item.phone === "Error"
  );

  if (missingRequiredApplicants.length === extractedDataArray.length) {
      document.getElementById('job-loader').style.display='none';
      showMessage("Mobile number and email are mandatory. None of the selected resumes had both fields.", 'error');
      return;
  }

  if (missingRequiredApplicants.length > 0) {
      showMessage(`Skipped ${missingRequiredApplicants.length} resume(s) because mobile number or email was missing.`, 'error');
  }

  const validExtractedData = extractedDataArray.filter(item =>
    item &&
    item.email &&
    item.email !== "Not Found" &&
    item.email !== "Error" &&
    item.phone &&
    item.phone !== "Not Found" &&
    item.phone !== "Error"
  );
  
  const formData = new FormData();
  validFiles.forEach((file, index) => {
        if (validExtractedData.includes(extractedDataArray[index])) {
            formData.append('resume_files[]', file);
        }
   });
 formData.append('resume_data', JSON.stringify(validExtractedData));
         <?php if(isset($_GET['jid']) && $_GET['jid']){?> formData.append("jobid","<?php echo $_GET['jid'];?>"); <?php } ?>
        
$.ajax({
    url: 'data/applicant_import2.php',
    type: 'POST',        
    data: formData,
    processData: false, // Important: prevent jQuery from processing the data
    contentType: false,
    success: function(response) {
      $("#dataedit").html(response);
      fileStatusSpan.textContent = "";
      resultsContainer.classList.add('hidden');
    }
});


            });

            const technicalSkills = [
                "C", "C++", "Java", "JavaScript", "TypeScript", "Python", "PHP", "Ruby", "Go", "Rust", "Kotlin", "Swift", "R", "Scala", "Perl", "MATLAB",
                "HTML", "CSS", "Sass", "Bootstrap", "Tailwind CSS", "React.js", "Next.js", "Angular", "Vue.js", "Svelte", "jQuery",
                "Node.js", "Express.js", "Django", "Flask", "Spring Boot", "Laravel", "CodeIgniter", "Ruby on Rails", "ASP.NET",
                "MySQL", "PostgreSQL", "MongoDB", "SQLite", "Redis", "Oracle", "MariaDB", "Firebase", "Cassandra", "Elasticsearch",
                "AWS", "Microsoft Azure", "Google Cloud Platform (GCP)", "Heroku", "DigitalOcean", "Netlify", "Vercel",
                "Docker", "Kubernetes", "Jenkins", "Git", "GitHub", "GitLab", "Bitbucket", "CI/CD", "Terraform", "Ansible",
                "React Native", "Flutter", "Swift (iOS)", "Kotlin (Android)", "Ionic", "Xamarin",
                "TensorFlow", "PyTorch", "Scikit-learn", "Keras", "Pandas", "NumPy", "Matplotlib", "Seaborn", "OpenCV", "NLTK",
                "Jest", "Mocha", "Chai", "Jasmine", "Selenium", "Cypress", "JUnit", "PyTest",
                "WordPress", "Shopify", "Jira", "Trello", "Figma", "Adobe XD", "Photoshop",
                "Penetration Testing", "Ethical Hacking", "OWASP", "Wireshark", "Metasploit"
            ];
            
            const degreeKeywords = [
                // Bachelor Degrees
                "BA", "B.A", "b.a", "Bachelor of Arts",
                "BSc", "B.Sc", "BSE", "bsc", "b.sc", "bse", "Bachelor of Science",
                "BCom", "B.Com", "bcom", "b.com", "Bachelor of Commerce",
                "BBA", "bba", "Bachelor of Business Administration",
                "BCA", "bca", "Bachelor of Computer Applications",
                "BTech", "B.Tech", "btech", "b.tech", "Bachelor of Technology",
                "BE", "B.E", "be", "b.e", "Bachelor of Engineering",
                "LLB", "LL.B", "llb", "ll.b", "Bachelor of Laws",
                "MBBS", "mbbs", "Bachelor of Medicine, Bachelor of Surgery",
                "BEd", "B.Ed", "bed", "b.ed", "Bachelor of Education",
                "BPharm", "B.Pharm", "bpharm", "b.pharm", "Bachelor of Pharmacy",
                "BFA", "bfa", "Bachelor of Fine Arts",
                "BDS", "bds", "Bachelor of Dental Surgery",
                "BHM", "bhm", "Bachelor of Hotel Management",

                // Master Degrees
                "MA", "M.A", "m.a", "Master of Arts",
                "MSc", "M.Sc", "MSE", "msc", "m.sc", "mse", "Master of Science",
                "MCom", "M.Com", "mcom", "m.com", "Master of Commerce",
                "MBA", "mba", "Master of Business Administration",
                "MCA", "mca", "Master of Computer Applications",
                "MTech", "M.Tech", "mtech", "m.tech", "Master of Technology",
                "ME", "M.E", "me", "m.e", "Master of Engineering",
                "LLM", "LL.M", "llm", "ll.m", "Master of Laws",
                "MD", "md", "Doctor of Medicine",
                "MEd", "M.Ed", "med", "m.ed", "Master of Education",
                "MPharm", "M.Pharm", "mpharm", "m.pharm", "Master of Pharmacy",
                "MFA", "mfa", "Master of Fine Arts",
                "MDS", "mds", "Master of Dental Surgery",

                // Doctorate
                "PhD", "Ph.D", "phd", "ph.d", "DPhil", "dphil", "Doctor of Philosophy",

                // Diplomas
                "DipEngg", "Dip.Engg", "dipengg", "dip.engg", "Diploma in Engineering",
                "Poly", "poly", "Polytechnic Diploma",
                "DPharm", "D.Pharm", "dpharm", "d.pharm", "Diploma in Pharmacy",
                "GNM", "gnm", "General Nursing & Midwifery",
                "ANM", "anm", "Auxiliary Nursing Midwifery",
                "ITI", "iti", "Industrial Training Institute",
                "PGDM", "pgdm", "Post Graduate Diploma in Management",
                "PGDCA", "pgdca", "Post Graduate Diploma in Computer Applications"
            ];

            function extractInfo(fileName, text) {
                const extracted = {
                    name: "Not Found",
                    email: "Not Found",
                    phone: "Not Found",
                    experience: "Not Found",
                    technicalSkills: [],
                    education: []
                };
                
                // Extract experience from file name between brackets
                const experienceRegex = /\[(\d+)y(?:_(\d+)m)?\]/;
                const experienceMatch = fileName.match(experienceRegex);
                if (experienceMatch) {
                    const years = experienceMatch[1];
                    const months = experienceMatch[2] || '0';
                    extracted.experience = `${years} Years ${months} Months`;
                }
                
                // Extract name from file name
                let nameFromFile = fileName.replace(/^Naukri_/, '');
                const bracketIndex = nameFromFile.indexOf('[');
                if (bracketIndex !== -1) {
                    nameFromFile = nameFromFile.substring(0, bracketIndex);
                }
                
                // Add a space before every capital letter and then trim leading/trailing spaces
                nameFromFile = nameFromFile.replace(/([A-Z])/g, ' $1').trim();
                extracted.name = nameFromFile;

const fixedText = text.replace(/(\r\n|\n|\r)/gm, ' ').replace(/\s+/g, ' ').trim();

const normalizedText = fixedText.replace(
  /([A-Za-z0-9._%+-])\s*@\s*([A-Za-z0-9.-]+)\s*\.\s*([A-Za-z]{2,})/g,
  '$1@$2.$3'
);

// Now extract email
const emailRegex = /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/i;
const emailMatch = normalizedText.match(emailRegex);
if (emailMatch) {
  extracted.email = emailMatch[0].trim();
}
          
const phoneRegex = /(?:\+?91[\s-]*)?\d[\d\s-]{8,}\d/g;
const phoneMatch = normalizedText.match(phoneRegex);
if (phoneMatch) {
    let num = phoneMatch[0].replace(/\D/g, ""); // remove everything except digits
    if (num.startsWith("91") && num.length > 10) {
        num = num.slice(-10); // keep last 10 digits only
    }
    if (num.length > 10) {
        num = num.slice(-10);
    }
    extracted.phone = num;
}

                // 3. Technical Skills: Find keywords in the resume text
                const extractedSkills = new Set();
                technicalSkills.forEach(skill => {
                    // Escape special regular expression characters in the skill string to prevent errors.
                    const escapedSkill = skill.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                    // Create a regex for the skill to handle various formats like "React.js" or "React"
                    // Use word boundaries to match whole words and escape special characters like '.'
                    const searchPattern = new RegExp(`\\b${escapedSkill}\\b`, 'i');
                    if (searchPattern.test(text)) {
                        extractedSkills.add(skill);
                    }
                });
                extracted.technicalSkills = Array.from(extractedSkills);

                // 4. Education: Find degrees and diplomas in the resume text
                const extractedEducation = new Set();
                degreeKeywords.forEach(degree => {
                    // Escape special regular expression characters in the degree string
                    const escapedDegree = degree.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                    // Create a regex for the degree, ensuring word boundaries and case-insensitivity
                    const searchPattern = new RegExp(`\\b${escapedDegree}\\b`, 'i');
                    if (searchPattern.test(text)) {
                        // Normalize the found degree to a consistent case before adding to the Set
                        extractedEducation.add(degree.toLowerCase());
                    }
                });
                extracted.education = Array.from(extractedEducation);

                return extracted;
            }

            // Function to display the extracted information for multiple files
            function displayResults(dataArray) {
                
                resultsList.innerHTML = ''; // Clear previous results
                dataArray.forEach(data => {
                    const resultText = `
[
    { "name": "${data.name}" },
    { "mobileNumber": "${data.phone}" },
    { "email": "${data.email}" },
    { "experience": "${data.experience}" },
    { "technicalSkills": ${JSON.stringify(data.technicalSkills, null, 4)} },
    { "education": ${JSON.stringify(data.education, null, 4)} }
]`;
                    const resultDiv = document.createElement('div');
                    resultDiv.classList.add('bg-gray-50', 'p-6', 'rounded-lg', 'text-sm', 'text-gray-700');
                    resultDiv.innerHTML = `<h3 class="font-bold text-base mb-2">${data.name}</h3><pre class="whitespace-pre-wrap break-words overflow-x-auto">${resultText}</pre>`;
                    resultsList.appendChild(resultDiv);
                });
                resultsContainer.classList.remove('hidden');
                showMessage(`${dataArray.length} files processed successfully!`, 'success');
            }
        });
    </script>
<span id="dataedit"></span>
</body>
</html>
