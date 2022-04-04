function addNewModule(){
    var newModule = document.createElement("div"); 
    var modulesCount = document.querySelectorAll(".module-container").length;
    if(document.getElementById("module-id-" + modulesCount)){
        modulesCount++;
    }
    newModule.setAttribute("class", "card p-3 mb-2 module-container");            
    newModule.setAttribute("id", "module-id-" + modulesCount);   
    newModule.innerHTML = `
                        <div class="row pl-3 d-flex justify-content-between">          
                            <a class="col-10 p-0 text-secondary" style="text-decoration:none" data-toggle="collapse" href="#module_collapse_${modulesCount}" role="button" aria-expanded="false" aria-controls="module_collapse_${modulesCount}">
                                <h5 class="col-12 p-0" id="module-title-${modulesCount}">Módulo ${modulesCount +1}</h5>                                
                            </a>
                            <button onclick="removeModule(${modulesCount})" type="button" class="btn btn-outline-secondary mr-2">Remover</button>
                        </div>

                        <div class="collapse show" id="module_collapse_${modulesCount}">
                            <div class="form-group">
                                <label for="modules[${modulesCount}][title]">Título do Módulo</label>
                                <input type="text" class="form-control" id="modules[${modulesCount}][title]" name="modules[${modulesCount}][title]" placeholder="Introdução" onblur="changeModuleTitle(${modulesCount})" required>                
                            </div>
                            <div class="form-group">
                                <label for="modules[${modulesCount}][description]">Descrição</label>
                                <textarea class="form-control" id="modules[${modulesCount}][description]" name="modules[${modulesCount}][description]" rows="2" required></textarea>
                            </div>

                            <!-- Content Data -->
                            <div id="content-list-${modulesCount}">  
                                <div class="container bg-light p-3 rounded content-container-${modulesCount}" id="content-id-${modulesCount}-0">
                                    <a class="col-12 p-0 text-dark" style="text-decoration:none" data-toggle="collapse" href="#content_collapse_${modulesCount}_0" role="button" aria-expanded="false" aria-controls="content_collapse_${modulesCount}_0">
                                        <h5 class="col-12 p-0" id="content-title-${modulesCount}-0">Conteúdo 1</h5>
                                    </a>

                                    <div class="collapse show" id="content_collapse_${modulesCount}_0">
                                        <div class="form-group">
                                            <label for="modules[${modulesCount}][contents][0][title]">Título</label>
                                            <input type="text" class="form-control" id="modules[${modulesCount}][contents][0][title]" name="modules[${modulesCount}][contents][0][title]" onblur="changeContentTitle(${modulesCount}, 0)" required>                
                                        </div>
                                        <div class="form-group">
                                            <label for="modules[${modulesCount}][contents][0][content]">Conteúdo</label>
                                            <textarea class="form-control" id="modules[${modulesCount}][contents][0][content]" name="modules[${modulesCount}][contents][0][content]" rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button onclick="addNewContent(${modulesCount})" type="button" class="btn btn-outline-secondary mt-2">Adicionar Conteúdo</button>
                        </div>                         
                    `;
    document.getElementById("modules-list").append(newModule);
};

function addNewContent(id){
    var newContent = document.createElement("div"); 
    var contentCount = document.querySelectorAll(".content-container-"+id).length;
    if(document.getElementById("content-id-" + id + "-" + contentCount)){
        contentCount++;
    }
    newContent.setAttribute("class", "container bg-light p-3 rounded content-container-"+id);            
    newContent.setAttribute("id", "content-id-" + id + "-" + contentCount);
    newContent.innerHTML = `
                            <div class="row pl-3 d-flex justify-content-between">
                                <a class="col-10 p-0 text-dark" style="text-decoration:none" data-toggle="collapse" href="#content_collapse_${id}_${contentCount}" role="button" aria-expanded="false" aria-controls="content_collapse_${id}_${contentCount}">
                                    <h5 class="col-12 p-0" id="content-title-${id}-${contentCount}">Conteúdo ${contentCount + 1}</h5>                                   
                                </a>
                                 <button onclick="removeContent(${id},${contentCount})" type="button" class="btn btn-outline-secondary mr-2">Remover</button>
                            </div>

                            <div class="collapse show" id="content_collapse_${id}_${contentCount}">
                                <div class="form-group">
                                    <label for="modules[${id}][contents][0][title]">Título</label>
                                    <input type="text" class="form-control" id="modules[${id}][contents][${contentCount}][title]" name="modules[${id}][contents][${contentCount}][title]" onblur="changeContentTitle(${id}, ${contentCount})" required>                
                                </div>
                                <div class="form-group">
                                    <label for="modules[${id}][contents][${contentCount}][content]">Conteúdo</label>
                                    <textarea class="form-control" id="modules[${id}][contents][${contentCount}][content]" name="modules[${id}][contents][${contentCount}][content]" rows="5" required></textarea>
                                </div>
                            </div>                        
                        `;  
    document.getElementById("content-list-"+id).append(newContent);
}

function removeContent(moduleIndex, contentIndex){
    var module = document.getElementById("content-id-" + moduleIndex + "-" + contentIndex);
    module.remove();
}


function removeModule(index){
    var module = document.getElementById("module-id-" + index);    
    module.remove();
}

function changeModuleTitle(index){
    var module = document.getElementById("module-title-" + index);
    var moduleTitle = document.getElementById("modules["+index+"][title]").value;
    module.innerHTML = "Módulo: " + moduleTitle;    
}

function changeContentTitle(moduleIndex, contentIndex){
    var content = document.getElementById("content-title-" + moduleIndex + "-" + contentIndex);
    var contentTitle = document.getElementById("modules["+moduleIndex+"][contents]["+contentIndex+"][title]").value;
    console.log(contentTitle);
    content.innerHTML = "Conteúdo: " + contentTitle;
}



