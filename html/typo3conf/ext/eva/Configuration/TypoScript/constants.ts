
plugin.tx_eva_tight {
    view {
        # cat=plugin.tx_eva_tight/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:eva/Resources/Private/Templates/
        # cat=plugin.tx_eva_tight/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:eva/Resources/Private/Partials/
        # cat=plugin.tx_eva_tight/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:eva/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_eva_tight//a; type=string; label=Default storage PID
        storagePid =
    }
}
