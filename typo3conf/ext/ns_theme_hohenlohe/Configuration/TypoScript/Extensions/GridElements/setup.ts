# TypoScript for rendering in frontend
tt_content.gridelements_pi1.20.10.setup {
   
   	nsContainerSection < lib.gridelements.defaultGridSetup
    nsContainerSection {
        cObject = FLUIDTEMPLATE
        cObject {
            file = typo3conf/ext/ns_theme_hohenlohe/Resources/Private/Extension/Gridelements/nsContainerSection.html
        }
    }

    nsBase1Col < lib.gridelements.defaultGridSetup
    nsBase1Col {
        cObject = FLUIDTEMPLATE
        cObject {
            file = typo3conf/ext/ns_theme_hohenlohe/Resources/Private/Extension/Gridelements/nsBase1Col.html
        }
    }
}
