<div id="modalProject" class="flex-1 flex justify-center items-center fixed inset-0 bg-black/50 hidden justify-center items-center z-[999]">
    <div class="bg-white p-6 rounded shadow-lg w-96 relative">
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-bold text-lg">New Project</h2>
            <button onclick="closeModal()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="space-y-4 mb-6">
            <div>
            <label>Name</label><br>
            <input type="text" id="project-name" value="New Project" class="px-[10px] border border-gray-500">
            </div>

            <div class="flex gap-4">
                <div class="flex flex-col w-24">
                    <label class="font-medium">Width</label>
                    <input type="text" id="project-width" class="px-2 py-1 border border-gray-500 h-[26px]">
                </div>

                <div class="flex flex-col w-24">
                    <label class="font-medium">Height</label>
                    <input type="text" id="project-height" class="px-2 py-1 border border-gray-500 h-[26px]">
                </div>
                
                <select class="mt-[24px] px-2 py-1 border border-gray-500 h-[26px] w-[112px] overflow-hidden">
                    <option class="truncate max-w-full">Pixels (px)</option>
                    <option class="truncate max-w-full">Percent (%)</option>
                    <option class="truncate max-w-full">Centimeters (cm)</option>
                    <option class="truncate max-w-full">Milimeters (mm)</option>
                    <option class="truncate max-w-full">Inches (inch)</option>
                </select>
            </div>
            
            <div>
                <label>Background</label><br>
                <select class="px-2 py-1 border border-gray-500 h-[26px] w-[110px] overflow-hidden">
                    <option class="truncate max-w-full">White</option>
                    <option class="truncate max-w-full">Black</option>
                    <option class="truncate max-w-full">Transparent</option>
                    <option class="truncate max-w-full">Custom</option>
                </select>
            </div>

            <div>
                <label>Profile</label><br>
                <select class="px-2 py-1 border border-gray-500 h-[26px] w-[110px] overflow-hidden">
                    <option class="truncate max-w-full">sRGB</option>
                    <option class="truncate max-w-full">Adobe RGB</option>
                    <option class="truncate max-w-full">ProPhoto RGB</option>
                    <option class="truncate max-w-full">Display P3</option>
                </select>
            </div>

            <button type="button" onclick="submitNewProject()" class="items-center px-4 py-2 border border-gray-500 rounded">Create</button>
        </div>

        <nav class="flex flex-row gap-4">
            <ul class="flex flex-row gap-2">
                <li>Social</li>
                <li>Print</li>
                <li>Photo</li>
                <li>Screen</li>
                <li>Mobile</li>
                <li>Ads</li>
            </ul>
        </nav>
        <div class="hidden">
            <ul>
                <li>FB Page Cover</li>
                <li>FB Event Image</li>
                <li>FB Group Header</li>
                <li>Instagram</li>
                <li>Insta Story</li>
                <li>Insta Potrait</li>
                <li>Youtube Thumbnail</li>
                <li>Youtube Profile</li>
                <li>Youtube Cover</li>
                <li>Twitter Profile</li>
                <li>Twitter Header</li>
            </ul>
        </div>

        <div class="hidden">
            <ul>
                <li>A3</li>
                <li>A4</li>
                <li>A5</li>
                <li>A6</li>
                <li>B3</li>
                <li>B4</li>
                <li>B5</li>
                <li>Letter</li>
                <li>Ledger</li>
                <li>Business Card</li>
            </ul>
        </div>

        <div class="hidden">
            <ul>
                <li>Wallet</li>
                <li>Eprint</li>
                <li>5 x 7 in</li>
                <li>A6</li>
                <li>B3</li>
                <li>B4</li>
                <li>B5</li>
                <li>Letter</li>
                <li>Ledger</li>
                <li>Business Card</li>
            </ul>
        </div>
    </div>
</div>
<script>
    function submitNewProject(){
        const name = document.getElementById('project-name').value;
        const width = document.getElementById('project-width').value;
        const height = document.getElementById('project-height').value;

        // createNewProject(name, width, height);
        const project = {
            id: "project-" + Date.now(),
            name,
            width,
            height
        };
        // };

        // Simpan ke localStorage
        localStorage.setItem("activeProject", JSON.stringify(project));

        closeModal();
        window.location.href = "/studio";
    }
</script>
<script>
    let projectCount = 0;
    let activeProject = null;
    const projects = {};

    function createNewProject(name, width, height) {
        projectCount++;
        const projectId = "project-" + projectCount;

        projects[projectId] = {
            id: projectId,
            name: name,
            width: width,
            height: height
        };

        console.log(projectId, name);

        // addProjectTab(projectId, name);
        // setActiveProject(projectId);
    }
</script>
  